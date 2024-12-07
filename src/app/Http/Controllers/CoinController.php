<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\CoinRequest;
use App\Models\Coin;
use App\Respondors\CoinRespondor;
use Illuminate\Support\Facades\Auth;

class CoinController extends Controller
{
    public function __construct(public CoinRespondor $coinRespondor)
    {
        
    }

    public function index()
    {
        $user = Auth::user();
        $coin = $user->coins()->paginate(10);

        return $this->coinRespondor->respondCollection($coin, 200);
    }

    public function store(CoinRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $coin = Coin::create($data);

        return $this->coinRespondor->respondResource($coin, 200);
    }

    public function update(Coin $coin, CoinRequest $request)
    {
        $data = $request->validated();
        $coin->update($data);

        return $this->coinRespondor->respondResource($coin, 200);
    }

    public function destroy(Coin $coin)
    {
        $coin->delete();

        return 'deleted';
    }
}
