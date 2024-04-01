<?php

namespace App\Http\Controllers;

use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecentAccountTransactionController extends Controller
{
    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction;
    }

    public function __invoke(int $account): JsonResponse
    {
        return response()->json($this->transaction->getRecentTransactionsByAccount($account));
    }
}
