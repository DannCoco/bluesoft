<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionType;

class EloquentTransaction implements TransactionRepository
{
    public function __construct(private Transaction $transaction)
    {

    }

    public function All($data): Collection
    {
        return $this->transaction::all($data);
    }

    public function create(array $data): Model
    {
        return $this->transaction::create($data);
    }

    public function getById(int $id): Model
    {
        return $this->transaction::where('id', $id)->first();
    }

    public function update(int $id, array $data): bool
    {
        $transaction = $this->transaction::find($id);

        if ($transaction instanceof Transaction) {
            return $transaction->update($data);
        }
    }

    public function delete(int $id): bool
    {
        return $this->transaction::find($id)->delete();
    }

    public function getRecentTransactionsByAccount(int $id): Collection
    {
        return $this->transaction::where('account_id', $id)->latest()->skip(1)->take(5)->get();
    }

    public function getStatementsByAccount(int $id, array $data): Collection
    {
        return $this->transaction::select('amount', 'transaction_types.name AS transaction', 'cities.name AS city', 'status.name AS status_account', 'transactions.created_at')
            ->join('transaction_types', function ($query) {
                $query->on('transactions.transaction_type_id', '=', 'transaction_types.id');
            })
            ->join('cities', function ($query) {
                $query->on('transactions.city_id', '=', 'cities.id');
            })
            ->join('status', function ($query) {
                $query->on('transactions.status_id', '=', 'status.id');
            })
            ->where('account_id', $id)
            ->whereBetween('created_at', [$data['startDate'] . " 00:00:00", $data['endDate'] . " 23:59:59"])
            ->orderByDesc('created_at')
            ->get();
    }

    public function getTransactionCountPerAccount(array $data): Collection
    {
        return $this->transaction::selectRaw('count(transactions.id) AS total_transactions, concat(customers.name, " ", customers.surname) AS customer_name')
            ->join('accounts', function ($query) {
                $query->on('transactions.account_id', '=', 'accounts.id');
            })
            ->join('customers', function ($query) {
                $query->on('accounts.customer_id', '=', 'customers.id');
            })
            ->whereBetween('transactions.created_at', [$data['startDate'] . " 00:00:00", $data['endDate'] . " 23:59:59"])
            ->groupBy('account_id')
            ->orderBy('total_transactions', 'DESC')
            ->get();
    }

    public function getOutOfTownTransaction(array $data): Collection
    {
        return $this->transaction::selectRaw('concat(customers.name, " ", customers.surname) AS customer_name, amount')
        ->join('accounts', function ($query) {
            $query->on('transactions.account_id', '=', 'accounts.id');
        })
        ->join('customers', function ($query) {
            $query->on('accounts.customer_id', '=', 'customers.id');
        })
        ->where('transaction_type_id', $data['transactionType'])
        ->where('transactions.city_id', '<>', 'accounts.city_id')
        ->where('amount', '>', $data['amount'])
        ->orderBy('amount','DESC')
        ->get();
    }
}