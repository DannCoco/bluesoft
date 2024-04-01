<?php

namespace App\Repositories\Customer;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CustomerRepository
{
    public function All($data): Collection;

    public function create(array $data): Model;

    public function getById(int $id): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getCustomerWithAccount(int $id): Model;
}