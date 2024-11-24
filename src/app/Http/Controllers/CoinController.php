<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\CoinRequest;
use App\Models\Coin;
use App\Respondors\CoinRespondor;

class CoinController extends Controller
{
    public function __construct(public CoinRespondor $cashRespondor)
    {
        
    }

    public function store(CoinRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $coin = Coin::create($data);

        return $this->cashRespondor->respondResource($coin, 200);
    }

    public function update(Coin $coin, CoinRequest $request)
    {
        $data = $request->validated();
        $coin->update($data);

        return $this->cashRespondor->respondResource($coin, 200);
    }

    public function destroy(Coin $coin)
    {
        $coin->delete();

        return 'deleted';
    }
}
