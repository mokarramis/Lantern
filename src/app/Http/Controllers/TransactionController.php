<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\TransactionRequest;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use App\Respondors\TransactionRespondor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct(public TransactionRespondor $transactionRespondor, public TransactionRepository $transactionRepository)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;

        $transaction = $this->transactionRepository->create($data);

        return $this->transactionRespondor->respondResource($transaction, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
