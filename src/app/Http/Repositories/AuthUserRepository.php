<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\AuthUserInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthUserRepository extends BaseRepository implements AuthUserInterface
{
  public function __construct(User $user)
  {
    parent::__construct($user);
  }


  public function signUp(array $data): Model
  {
    $user = $this->model->create($data);
    $user->token = $this->createToken($user);

    return $user;
  }


  public function authAttempt(array $data): bool
  {
    if (Auth::attempt($data)) {
      return true;
    }

    return false;
  }


  public function createToken($user): string
  {
    $token = $user->createToken('Api Token')->accessToken;

    return $token;
  }


  public function resetPassword(array $data): Model
  {
    
  }

  
  public function logout()
  {
    $user = Auth::user()->token()->revoke();

    return true;
  }
}