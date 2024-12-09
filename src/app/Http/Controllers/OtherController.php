<?php

namespace App\Http\Controllers;

use App\Http\Requests\Asset\OtherRequest;
use App\Models\Other;
use App\Repositories\OtherRepository;
use App\Respondors\OtherRespondor;
use Illuminate\Support\Facades\Auth;

class OtherController extends Controller
{
    public function __construct(public OtherRepository $otherRepository, public OtherRespondor $otherRespondor)
    {
        
    }

    public function index()
    {
        $user = Auth::user();
        $asset = $user->assets;

        return $this->otherRespondor->respondCollection($asset, 200);
    }


    public function store(OtherRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $asset = $this->otherRepository->create($data);

        return $this->otherRespondor->respondResource($asset, 200);
    }

    public function update(Other $other, OtherRequest $request)
    {
        $data = $request->validated();
        $other->update($data);

        return $this->otherRespondor->respondResource($other, 200);
    }

    public function destroy(Other $other)
    {
        $other = $other->delete();

        return $this->otherRespondor->respondResource($other, 200);
    }
}
