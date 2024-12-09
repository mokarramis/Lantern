<?php

namespace App\Http\Controllers;

use App\Http\Requests\Analysis\AnalysisRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class AnalysisController extends Controller
{
    public function index(AnalysisRequest $requset)
    {
        $data = $requset->validated();
        $userId = Auth::user()->id;

        $transaction = Transaction::where('user_id', $userId)->where('category', $data['category'])->get()->groupBy('time');
        $result = fillDays($transaction);

        return $result;
    }
}
