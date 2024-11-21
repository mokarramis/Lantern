<?php

namespace App\Http\Controllers;

use App\Http\Repositories\AuthUserRepository;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthSignUpRequest;
use App\Http\Resources\Auth\UserResource;

class AuthController extends Controller
{
    public function __construct(public AuthUserRepository $authUserRepository)
    {
        
    }


    public function signUp(AuthSignUpRequest $requset)
    {
        $data = $requset->validated();
        $data['password'] = bcrypt($data['password']);
        $user = $this->authUserRepository->signUp($data);

        return new UserResource($user);
    }


    public function login(AuthLoginRequest $requset)
    {
        $data = $requset->validated();
        $authAttempt = $this->authUserRepository->authAttempt($data);
        if ($authAttempt) {
           $user = auth()->user();
           $token = $this->authUserRepository->createToken($user);
           $user->token = $token;

           return new UserResource($user);
        }

        return 'user not found';
    }

    
    public function logout()
    {
        $this->authUserRepository->logout();

        return 'logged out';
    }
}
