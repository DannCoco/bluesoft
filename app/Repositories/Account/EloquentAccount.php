<?php

namespace App\Repositories\Account;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentAccount implements AccountRepository
{
    public function __construct(private Account $account)
    {
        
    }

    public function All(): Collection
    {
        return $this->account::all();
    }

    public function create(array $data): Model
    {
        return $this->account::create($data);
    }

    public function getById(int $id): Model
    {
        return $this->account::where('id', $id)->first();
    }

    public function update(int $id, array $data): bool
    {
        $account = $this->account::find($id);

        if($account instanceof Account){
            return $account->update($data);
        }
    }

    public function delete(int $id): bool
    {
        return $this->account::find($id)->delete();
    }
}