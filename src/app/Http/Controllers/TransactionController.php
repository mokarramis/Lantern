<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\TransactionRequest;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use App\Respondors\TransactionRespondor;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct(public TransactionRespondor $transactionRespondor, public TransactionRepository $transactionRepository)
    {
        
    }
   
    
    public function index()
    {
        $userId = Auth()->user()->id;
        $transactions = Transaction::query()->where('user_id', $userId)->thisMonth()->paginate(10);

        return $this->transactionRespondor->respondCollection($transactions, 200);
    }

    
    public function store(TransactionRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;

        $transaction = $this->transactionRepository->create($data);

        return $this->transactionRespondor->respondResource($transaction, 200);
    }


    public function destroy(Transaction $transaction)
    {
        $this->transactionRepository->delete($transaction);
    }
}
