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
        $data['password'] = bcrypt($data['password']);
        $user = $this->authUserRepository->login($data);

        return new UserResource($user);
    }
}
