<?php

namespace App\Http\Repositories\Interfaces;

use App\Http\Requests\Auth\AuthSignUpRequest;
use Illuminate\Database\Eloquent\Model;

interface AuthUserInterface
{
  public function signUp(array $data): Model;
  public function authAttempt(array $data): bool;
  public function createToken($data): string;
  public function logout();
  public function resetPassword(array $data): Model;
}