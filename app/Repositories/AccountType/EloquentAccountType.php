<?php

namespace App\Repositories\AccountType;

use App\Models\AccountType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentAccountType implements AccountTypeRepository
{
    public function __construct(private AccountType $accountType)
    {
        
    }

    public function All($data): Collection
    {
        return $this->accountType::all($data);
    }

    public function create(array $data): Model
    {
        return $this->accountType::create($data);
    }

    public function getById(int $id): Model
    {
        return $this->accountType::where('id', $id)->first();
    }

    public function update(int $id, array $data): bool
    {
        $accountType = $this->accountType::find($id);

        if($accountType instanceof AccountType){
            return $accountType->update($data);
        }
    }

    public function delete(int $id): bool
    {
        return $this->accountType::find($id)->delete();
    }
}