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
    $user->token = $user->createToken('Api Token')->accessToken;

    return $user;
  }

  public function login(array $data): Model
  {
    if (Auth::attempt($data)) {
      $token = auth()->user()->createToken('Api Token')->accessToken;
      return true;
    }

    return false;
  }

  public function resetPassword(array $data): Model
  {
    
  }

  public function logout()
  {

  }
}