<?php

namespace App\Http\Controllers;

use App\Repositories\Account\AccountRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BalanceAccountController extends Controller
{
    public function __construct(AccountRepository $account)
    {
        $this->account = $account;
    }

    public function __invoke(int $account): JsonResponse
    {
        $curentAccount = $this->account->getById($account);

        return response()->json(['message' => 'Su saldo actual es de: $'.$curentAccount->balance], 200);
    }
}
