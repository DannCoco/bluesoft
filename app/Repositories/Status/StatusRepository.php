<?php

namespace App\Repositories\Status;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface StatusRepository
{
    public function All($data): Collection;

    public function create(array $data): Model;

    public function getById(int $id): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}