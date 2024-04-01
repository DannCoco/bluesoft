<?php

namespace App\Repositories\TransactionType;

use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentTransactionType implements TransactionTypeRepository
{
    public function __construct(private TransactionType $transactionType)
    {
        
    }

    public function All($data): Collection
    {
        return $this->transactionType::all($data);
    }

    public function create(array $data): Model
    {
        return $this->transactionType::create($data);
    }

    public function getById(int $id): Model
    {
        return $this->transactionType::where('id', $id)->first();
    }

    public function update(int $id, array $data): bool
    {
        $transactionType = $this->transactionType::find($id);

        if($transactionType instanceof TransactionType){
            return $transactionType->update($data);
        }
    }

    public function delete(int $id): bool
    {
        return $this->transactionType::find($id)->delete();
    }
}