<?php

namespace App\Repositories\Status;

use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentStatus implements StatusRepository
{
    public function __construct(private Status $status)
    {
        
    }

    public function All($data): Collection
    {
        return $this->status::all($data);
    }

    public function create(array $data): Model
    {
        return $this->status::create($data);
    }

    public function getById(int $id): Model
    {
        return $this->status::where('id', $id)->first();
    }

    public function update(int $id, array $data): bool
    {
        $status = $this->status::find($id);

        if($status instanceof Status){
            return $status->update($data);
        }
    }

    public function delete(int $id): bool
    {
        return $this->status::find($id)->delete();
    }
}