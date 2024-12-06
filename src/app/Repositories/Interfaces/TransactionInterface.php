<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface TransactionInterface
{
  public function create(array $data): Model;
}