<?php

namespace App\Repositories\Account;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AccountRepository
{
    public function All(): Collection;

    public function create(array $data): Model;

    public function getById(int $id): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}