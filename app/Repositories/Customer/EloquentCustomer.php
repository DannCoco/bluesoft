<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentCustomer implements CustomerRepository
{
    public function __construct(private Customer $customer)
    {

    }

    public function All($data): Collection
    {
        return $this->customer::all($data);
    }

    public function create(array $data): Model
    {
        return $this->customer::create($data);
    }

    public function getById(int $id): Model
    {
        return $this->customer::where('id', $id)->first();
    }

    public function update(int $id, array $data): bool
    {
        $customer = $this->customer::find($id);

        if ($customer instanceof Customer) {
            return $customer->update($data);
        }
    }

    public function delete(int $id): bool
    {
        return $this->customer::find($id)->delete();
    }

    public function getCustomerWithAccount(int $id): Model
    {
        return $this->customer::select('customers.name AS customer', 'surname', 'number', 'account_types.name AS account', 'cities.name AS city', 'status.name AS status_account', 'accounts.id AS account_id')
            ->join('accounts', function ($query) {
                $query->on('customers.id', '=', 'accounts.id');
            })
            ->join('account_types', function ($query) {
                $query->on('accounts.account_type_id', '=', 'account_types.id');
            })
            ->join('cities', function ($query) {
                $query->on('accounts.city_id', '=', 'cities.id');
            })
            ->join('status', function ($query) {
                $query->on('accounts.status_id', '=', 'status.id');
            })
            ->where('customers.id', $id)->first();
    }
}