<?php

namespace App\Repositories\City;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentCity implements CityRepository
{
    public function __construct(private City $city)
    {
        
    }

    public function All($data): Collection
    {
        return $this->city::all($data);
    }

    public function create(array $data): Model
    {
        return $this->city::create($data);
    }

    public function getById(int $id): Model
    {
        return $this->city::where('id', $id)->first();
    }

    public function update(int $id, array $data): bool
    {
        $city = $this->city::find($id);

        if($city instanceof City){
            return $city->update($data);
        }
    }

    public function delete(int $id): bool
    {
        return $this->city::find($id)->delete();
    }
}