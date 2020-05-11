<?php

namespace App\Http\Controllers\API;

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
use Illuminate\Support\Str;


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
     * Get a JWT via given credentials.
     *
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function login(AuthRequest $request)
    {
        return $this->respondWithToken(auth()->attempt($request->validated()));
    }

    /**
     * @param RegisterRequest $request
     * @return ResponseFactory|Application|Response
     */
    public function register(RegisterRequest $request)
    {
        /** @var $user User */
        $user = User::query()->create($request->validated()['user']);
        $request->get('role') == User::DOCTOR
            ? $user->doctor()->create($request->validated()['doctor'])
            : $user->patient()->create($request->validated()['patient']);
        $user->smsCodes()->create(['code' => Str::random(10)]);

        return response(['Успешная регистрация']);
    }

    /**
     * @param UserVerifyRequest $request
     * @return ResponseFactory|Application|Response
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
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
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
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
