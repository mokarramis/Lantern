<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\AssetRequest;
use App\Models\Asset;
use App\Repositories\AssetRepository;
use App\Respondors\AssetRespondor;

class AssetController extends Controller
{
    public function __construct(public AssetRepository $assetRepository, public AssetRespondor $assetRespondor)
    {
        
    }


    public function store(AssetRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $asset = $this->assetRepository->create($data);

        return $this->assetRespondor->respondResource($asset, 200);
    }

    public function update(Asset $asset, AssetRequest $request)
    {
        $data = $request->validated();
        $asset->update($data);

        return $this->assetRespondor->respondResource($asset, 200);
    }

    public function destroy(Asset $asset)
    {
        $asset = $asset->delete();

        return $this->assetRespondor->respondResource($asset, 200);
    }
}
