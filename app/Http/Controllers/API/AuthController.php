<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\LocationRequest;
use App\Http\Requests\NotificationStateRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserVerifyRequest;
use App\User;
use App\UserSmsCode;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @group Auth
 *
 * APIs for
 */
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verify']]);
    }

    /**
     * Login
     *
     * @response 200
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function login(AuthRequest $request)
    {
        if (!$token = JWTAuth::attempt($request->only(['phone', 'password']))) {
            return response()->json([
                'error' => __('auth.unauthorized')
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Register
     *
     * @bodyParam name string required Имя пользователя
     * @bodyParam last_name string required Фамилия пользователя
     * @bodyParam second_name string required Отчество
     * @bodyParam phone string required Номер телефона Example: +74957556981
     * @bodyParam role string required Роль Example: doctor or patient
     * @bodyParam email string required Емейл
     * @bodyParam region_id integer required Регион
     * @bodyParam city_id integer required Город
     * @bodyParam street string required Улица
     * @bodyParam building string required Дом
     * @bodyParam apartment string required Квартира
     * @bodyParam password string required пароль
     * @bodyParam password_confirmation string required повторите пароль
     * @bodyParam lang_id integer required Язык
     *
     * @response 200
     * @param RegisterRequest $request
     * @return ResponseFactory|Application|Response
     */
    public function register(RegisterRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                /** @var $user User */
                $user = User::query()->create($request->validatedUser());
                $request->get('role') == User::DOCTOR
                    ? $user->createDoctor($request->validatedDoctor(), $request->validatedClinics(), $request->validatedSpecialisations())
                    : $user->patient()->create($request->validatedPatient());

                $user->smsCodes()->create(['code' => Str::random(10)]);
            });

            return response(['Успешная регистрация']);
        } catch (\Exception $exception) {
            return response(['error' => $exception->getMessage()], 422);
        }
    }

    /**
     * Verify
     * @bodyParam code string required смс код
     *
     * @param UserVerifyRequest $request
     * @return ResponseFactory|Application|Response
     *
     * @response 200
     */
    public function verify(UserVerifyRequest $request)
    {
        /** @var UserSmsCode $code */
        $code = UserSmsCode::query()->where('code', $request->get('code'))->firstOrFail();
        $code->user()->update(['verified' => true]);
        $code->user->smsCodes()->delete();

        return \response(['Номер телефона подтвержден']);
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function lang(Request $request)
    {
        $request->validate(['lang_id' => ['required', 'exists:langs,id']]);
        auth()->user()->update($request->only(['lang_id']));

        return \response(['Язык изменен']);
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Application|Response
     */
    public function phone(Request $request)
    {
        $request->validate(['phone' => ['required', 'phone:RU', Rule::unique('users', 'phone')->ignore(auth()->id())]]);
        auth()->user()->update($request->only(['phone']));

        return \response(['Телефон изменен']);
    }

    /**
     * @param LocationRequest $request
     * @return ResponseFactory|Application|Response
     */
    public function location(LocationRequest $request)
    {
        auth()->user()->update($request->validated());

        return \response(['Сохранено']);
    }

    /**
     * @param NotificationStateRequest $request
     * @return ResponseFactory|Application|Response
     */
    public function notification(NotificationStateRequest $request)
    {
        auth()->user()->update($request->validated());

        return \response(['Сохранено']);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     * @response 200
     */
    public function me()
    {
        return response()->json(User::query()->with(['city', 'region', 'patient'])->find(auth()->id()));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     * @response 200
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     * @response 200
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
