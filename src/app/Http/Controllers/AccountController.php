<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\AccountRequest;
use App\Models\Account;
use App\Respondors\AccountRespondor;

class AccountController extends Controller
{
    public function __construct(public AccountRespondor $cashRespondor)
    {
        
    }

    public function store(AccountRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $cash = Account::create($data);

        return $this->cashRespondor->respondResource($cash, 200);
    }

    public function update(Account $account, AccountRequest $request)
    {
        $data = $request->validated();
        $account->update($data);

        return $this->cashRespondor->respondResource($account, 200);
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return 'deleted';
    }
}
