<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reports\OutOfTownTransactionRequest;
use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OutOfTownTransactionsController extends Controller
{
    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction;
    }

    public function __invoke(OutOfTownTransactionRequest $request): JsonResponse
    {
        $data = $request->all();
        return response()->json($this->transaction->getOutOfTownTransaction($data));
    }
}
