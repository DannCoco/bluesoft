<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatementsRequest;
use App\Repositories\Transaction\TransactionRepository;
use App\Repositories\Customer\CustomerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatementsController extends Controller
{
    public function __construct(TransactionRepository $transaction, CustomerRepository $customer)
    {
        $this->transaction = $transaction;
        $this->customer = $customer;
    }

    public function __invoke(int $customer, StatementsRequest $request): JsonResponse
    {
        $data = $request->all();
        $customer = $this->customer->getCustomerWithAccount($customer);
        $statements = $this->transaction->getStatementsByAccount($customer->account_id, $data);
        
        return response()->json(['customer' => $customer, 'statements' => $statements]);
    }
}
