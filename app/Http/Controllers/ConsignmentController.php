<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsignmentRequest;
use App\Repositories\Account\AccountRepository;
use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Log;

class ConsignmentController extends Controller
{
    public function __construct(AccountRepository $account, TransactionRepository $transaction)
    {
        $this->account = $account;
        $this->transaction = $transaction;
    }

    public function __invoke(ConsignmentRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $accountCurrent = $this->account->getById($request->account);
            $balance = $accountCurrent->balance + $request->balance;
            $this->account->update($request->account, ['balance' => $balance]);

            $transaction = $this->transaction->create([
                'amount' => $request->balance,
                'account_id' => $request->account,
                'transaction_type_id' => $request->transaction_type,
                'city_id' => $request->city,
                'status_id' => 4
            ]);

            DB::commit();
            return response()->json(['message' => 'La transaccion se ha creado con éxito', 'transaction_id' => $transaction->id], 200);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error(__CLASS__ . ' ' . __METHOD__ . ' ' . __FUNCTION__ . ' :error ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
