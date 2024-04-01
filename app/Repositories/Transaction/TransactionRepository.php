<?php

namespace App\Repositories\Transaction;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface TransactionRepository
{
    public function All($data): Collection;

    public function create(array $data): Model;

    public function getById(int $id): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getRecentTransactionsByAccount(int $id): Collection;

    public function getStatementsByAccount(int $id, array $data): Collection;

    public function getTransactionCountPerAccount(array $data): Collection;

    public function getOutOfTownTransaction(array $data): Collection;
}