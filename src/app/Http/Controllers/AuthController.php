<?php

namespace App\Http\Controllers;

use App\Repositories\AuthUserRepository;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthSignUpRequest;
use App\Respondors\AuthRespondor;

class AuthController extends Controller
{
    public function __construct(public AuthUserRepository $authUserRepository, public AuthRespondor $authRespondor)
    {
        
    }


    public function signUp(AuthSignUpRequest $requset)
    {
        $data = $requset->validated();
        $data['password'] = bcrypt($data['password']);
        $user = $this->authUserRepository->signUp($data);

        return $this->authRespondor->respondResource($user, 200);
    }


    public function login(AuthLoginRequest $requset)
    {
        $data = $requset->validated();
        $authAttempt = $this->authUserRepository->authAttempt($data);
        if ($authAttempt) {
           $user = auth()->user();
           $token = $this->authUserRepository->createToken($user);
           $user->token = $token;

           return $this->authRespondor->respondResource($user, 200);
        }

        return 'user not found';
    }


    public function logout()
    {
        $this->authUserRepository->logout();

        return 'logged out';
    }
}
