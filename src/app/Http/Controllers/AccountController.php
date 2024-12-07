<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\AccountRequest;
use App\Models\Account;
use App\Respondors\AccountRespondor;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct(public AccountRespondor $accountRespondor)
    {
        
    }

    public function index()
    {
        $user = Auth::user();
        $accounts = $user->accounts;

        return $this->accountRespondor->respondCollection($accounts, 200);
    }

    public function store(AccountRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $account = Account::create($data);

        return $this->accountRespondor->respondResource($account, 200);
    }

    public function update(Account $account, AccountRequest $request)
    {
        $data = $request->validated();
        $account->update($data);

        return $this->accountRespondor->respondResource($account, 200);
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return 'deleted';
    }
}
