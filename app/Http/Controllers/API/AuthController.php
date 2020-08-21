<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\LocationRequest;
use App\Http\Requests\NameUpdateRequest;
use App\Http\Requests\AddDoctorRequest;
use App\Http\Requests\NotificationStateRequest;
use App\Http\Requests\UpdateEmail;
use App\Patient;
use App\Translate\ClinicTranslate;
use App\Translate\SpecializationTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
use App\Traits\StoreImageTrait;
use Carbon\Carbon;
use App\Http\Controllers\API\DurationController;

/**
 * @group Auth
 *
 * APIs for
 */
class AuthController extends Controller
{
    use StoreImageTrait;

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
     * @bodyParam phone string required
     * @bodyParam password string required
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
        if ($request->push_key)
        {
            $user = User::query()->where('phone',$request->phone)->first();
            $user->push_key = $request->push_key;
            $user->update();
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

//                $user->smsCodes()->create(['code' => mt_rand(1000, 9999)]);
            });
            $token = JWTAuth::attempt($request->only(['phone', 'password']));

            if ($request->file('image')) {
                $user = User::query()->where('id',auth()->user()->id)->first();
                $user->image =  'https://med.weedoo.ru/storage/app/'.$request->file('image')
                        ->store('avatar/'.$user->id);
                $user->update();
            }

            return response(['status'=>'success','message' => 'Register success', 'token' => $this->respondWithToken($token)->original]);
        } catch (\Exception $exception) {
            return response(['status'=>'error', 'message' => $exception->getMessage()], 422);
        }
    }

    /**
     * Re send sms
     * @bodyParam phone required string
     *
     * @response 200
     */
    public function send_sms(Request $request)
    {
        $user = User::query()->where('phone',$request->phone)->first();
        if ($user) {
            if ($user->smsCodes()->create(['code' => Str::random(10)])) {
                return response(['status' => 'success', 'message' => 'Смс успешно отправлена']);
            }
        }
        return response(['status' => 'error', 'message' => 'Пользователь не найден']);
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

        return \response(['status'=>'success','message' => 'Phone number has changed']);
    }

    /**
     * Set lang
     *
     * @bodyparam lang_id string required
     * @response 200
     */
    public function lang(Request $request)
    {
        $request->validate(['lang_id' => ['required', 'exists:langs,id']]);
        auth()->user()->update($request->only(['lang_id']));

        return \response(['status'=>'success','message'=>'Lang change']);
    }

    /**
     * Update phone
     *
     * @bodyParam phone string required
     *
     */
    public function phone(Request $request)
    {
        $request->validate(['phone' => ['required', 'phone:RU', Rule::unique('users', 'phone')->ignore(auth()->id())]]);
        auth()->user()->update($request->only(['phone']));

        return \response(['status'=>'success','message'=>'Phone change']);
    }

    /**
     * Update location
     *
     * @bodyParam region_id string required
     * @bodyParam city_id string required
     * @bodyParam street string required
     * @bodyParam building string required
     * @bodyParam apartment string
     *
     */
    public function location(LocationRequest $request)
    {
        auth()->user()->update($request->validated());

        return \response(['status'=>'success','message'=>'Saved']);
    }

    /**
     * @param AddDoctorRequest $request
     * @return ResponseFactory|Application|Response
     */

    public function setDoctor(AddDoctorRequest $request)
    {
        Patient::query()->update($request->validated());
        return \response([
            'status' => 'success',
            'message'=>'Saved']);
    }

    /**
     * Update name
     *
     * @bodyParam name string
     * @bodyParam last_name string
     * @bodyParam second_name string required
     *
     */
    public function name(NameUpdateRequest $request)
    {
        auth()->user()->update($request->validated());
        return \response(['status'=>'success','message'=>'Saved']);
    }

    /**
     * Set notification
     *
     * @bodyparam notification bool required
     */
    public function notification(NotificationStateRequest $request)
    {
        auth()->user()->update($request->validated());

        return \response(['status'=>'success','message'=>'Saved']);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     * @response 200
     */
    public function me()
    {
        $auth = User::find(auth()->id());
        if ($auth->role == 'patient') {
            $user = User::query()->with(['city', 'region', 'patient'])->find(auth()->id());
            $duration = new DurationController();
            $user->pregnanc = $duration->get_duration();
            $user->weight = $user->patient->weight;
        } else {
            $user = User::query()->with(['city', 'region', 'doctor'])->find(auth()->id());
            $user->specialisation = $user->doctor->specialisations;
            $user->clinic = $user->doctor->clinics;
            $user->specialisations = $user->doctor->specialisations;

            /* Нет времени разбиратся, потом переделать и убрать этот костыль */
            $specialisations_translate = [];
            foreach ($user->specialisations as $item) {
                $specialisations_translate[] = SpecializationTranslate::where('specialization_id', $item->id)->get();
            }
            $user->specialisations_translate = $specialisations_translate;
            /* Нет времени разбиратся, потом переделать и убрать этот костыль */
            $clinic_translate = [];
            foreach ($user->clinic as $item) {
                $clinic_translate[] = ClinicTranslate::where('clinic_id', $item->id)->get();
            }
            $user->clinic_translate = $clinic_translate;
        }
        /**/
        return response()->json($user);
    }

    /**
     * Update photo
     *
     * @bodyParam image image
     *
     */
    public function update_photo(Request $request)
    {
        if ($request->file('image')) {
            $user = User::query()->where('id',auth()->user()->id)->first();
            $user->image =  'https://med.weedoo.ru/storage/app/'.$request->file('image')
                    ->store('avatar/'.$user->id);
            $user->update();
        }
        return response()->json(['status' => 'success' , 'data' => $user]);
    }

    /**
     * @param UpdateEmail $request
     * @return JsonResponse
     */

    public function updateEmail(UpdateEmail $request)
    {
        $user = User::find(auth()->user()->id);
        $user->email = $request->email;
        $user->update();

        return \response()->json([
            'status' => 'success',
            'data' => $request->email
        ]);
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

        return response()->json(['status'=>'success','message' => 'Successfully logged out']);
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
