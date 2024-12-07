<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\CashRequest;
use App\Models\Cash;
use App\Respondors\CashRespondor;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    public function __construct(public CashRespondor $cashRespondor)
    {
        
    }

    public function index()
    {
        $user = Auth::user();
        $cash = $user->cashes()->paginate(10);

        return $this->cashRespondor->respondCollection($cash, 200);
    }

    public function store(CashRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $cash = Cash::create($data);

        return $this->cashRespondor->respondResource($cash, 200);
    }

    public function update(Cash $cash, CashRequest $request)
    {
        $data = $request->validated();
        $cash->update($data);

        return $this->cashRespondor->respondResource($cash, 200);
    }

    public function destroy(Cash $cash)
    {
        $cash->delete();

        return 'deleted';
    }
}
