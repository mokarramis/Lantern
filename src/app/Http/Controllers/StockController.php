<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\StockRequest;
use App\Models\Stock;
use App\Respondors\StockRespondor;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function __construct(public StockRespondor $stockRespondor)
    {
        
    }

    public function index()
    {
        $user = Auth::user();
        $stock = $user->stocks()->paginate(10);

        return $this->stockRespondor->respondCollection($stock, 200);
    }

    public function store(StockRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $coin = Stock::create($data);

        return $this->stockRespondor->respondResource($coin, 200);
    }

    public function update(Stock $stock, StockRequest $request)
    {
        $data = $request->validated();
        $stock->update($data);

        return $this->stockRespondor->respondResource($stock, 200);
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return 'deleted';
    }
}
