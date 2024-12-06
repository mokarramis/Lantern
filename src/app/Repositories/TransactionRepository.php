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
      $this->updateMorphRelation($data['price'], $model, $data['category']);
    } catch (\Exception $e) {
      return $e->getMessage();
    }

    return $transaction;
  }

  public function updateMorphRelation($transactionPrice, $model, $category)
  {
    try {
      if ($category == 'paid') {
        $model->update([
            'amount' => $model->amount - $transactionPrice
        ]);
      }
  
      if ($category == 'received') {
          $model->update([
              'amount' => $model->amount + $transactionPrice
          ]);
      }
    } catch (\Exception $e) {
      
    }

    return true;
  }

  public function deleteMorphRelation($transactionPrice, $model, $category)
  {
    try {
      if ($category == 'paid') {
        $model->update([
            'amount' => $model->amount + $transactionPrice
        ]);
      }
  
      if ($category == 'received') {
          $model->update([
              'amount' => $model->amount - $transactionPrice
          ]);
      }
    } catch (\Exception $e) {
      
    }

    return true;
  }

  public function delete(Transaction $transaction)
  {
    $model = $transaction->transactionable;
    $transactionPrice = $transaction->price;
    $category = $transaction->category;
    try {
      $this->deleteMorphRelation($transactionPrice, $model, $category);
    } catch (\Exception $e) {
      $e->getMessage();
    }

    $transaction->delete();

    return "deleted successfully.";

  }


}