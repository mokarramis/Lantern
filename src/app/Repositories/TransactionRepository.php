<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\TransactionInterface;
use Illuminate\Database\Eloquent\Model;

class TransactionRepository extends BaseRepository implements TransactionInterface
{
  public function __construct(Transaction $transaction)
  {
    parent::__construct($transaction);
  }

  public function create(array $data): Model
  {
    $transaction = $this->model->create($data);

    try {
      $model = $transaction->transactionable;
      $this->updateMorphRelation($data, $model);
    } catch (\Exception $e) {
      return $e->getMessage();
    }

    return $transaction;
  }

  public function updateMorphRelation(array $data, $model)
  {
    try {
      if ($data['category'] == 'paid') {
        $model->update([
            'amount' => $model->amount - $data['price']
        ]);
      }
  
      if ($data['category'] == 'received') {
          $data = $data['transactinable_type']->update([
              'amount' => $model->amount + $data['price']
          ]);
      }
    } catch (\Exception $e) {
      
    }

    return true;
  }


}