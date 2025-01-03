<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\GoldRequset;
use App\Models\Gold;
use App\Respondors\GoldRespondor;
use Illuminate\Support\Facades\Auth;

class GoldController extends Controller
{
    public function __construct(public GoldRespondor $goldRespondor)
    {
        
    }

    public function index()
    {
        $user = Auth::user();
        $gold = $user->golds()->paginate(10);

        return $this->goldRespondor->respondCollection($gold, 200);
    }

    public function store(GoldRequset $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $asset = Gold::create($data);

        return $this->goldRespondor->respondResource($asset, 200);
    }

    public function update(Gold $gold, GoldRequset $request)
    {
        $data = $request->validated();
        $gold->update($data);

        return $this->goldRespondor->respondResource($gold, 200);
    }

    public function destroy(Gold $gold)
    {
        $gold->delete();

        return 'deleted';
    }
}
