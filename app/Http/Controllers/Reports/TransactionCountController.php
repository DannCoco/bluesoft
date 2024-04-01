<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Repositories\Transaction\TransactionRepository;
use App\Http\Requests\Reports\TransactionCountRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionCountController extends Controller
{
    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction;
    }

    public function __invoke(TransactionCountRequest $request): JsonResponse
    {
        $data = $request->all();
        return response()->json($this->transaction->getTransactionCountPerAccount($data));
    }
}
