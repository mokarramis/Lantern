<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\GoldRequset;
use App\Models\Gold;
use App\Respondors\GoldRespondor;

class GoldController extends Controller
{
    public function __construct(public GoldRespondor $goldRespondor)
    {
        
    }
    public function store(GoldRequset $request, Gold $gold)
    {
        $data = $request->validated();
        $asset = $gold->create($data);

        return $this->goldRespondor->respondResource($asset, 200);
    }

    public function update(GoldRequset $request, Gold $gold)
    {
        $data = $request->validated();
        $asset = $gold->update($data);

        return $this->goldRespondor->respondResource($asset, 200);
    }

    public function destroy(Gold $gold)
    {
        $asset = $gold->delete();

        return $this->goldRespondor->respondResource($asset, 200);
    }
}
