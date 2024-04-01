<?php

namespace App\Providers;

use App\Repositories\Account\AccountRepository, App\Repositories\Account\EloquentAccount;
use App\Repositories\AccountType\AccountTypeRepository, App\Repositories\AccountType\EloquentAccountType;
use App\Repositories\City\CityRepository, App\Repositories\City\EloquentCity;
use App\Repositories\Customer\CustomerRepository, App\Repositories\Customer\EloquentCustomer;
use App\Repositories\Status\StatusRepository, App\Repositories\Status\EloquentStatus;
use App\Repositories\Transaction\TransactionRepository, App\Repositories\Transaction\EloquentTransaction;
use App\Repositories\TransactionType\TransactionTypeRepository, App\Repositories\TransactionType\EloquentTransactionType;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AccountRepository::class, EloquentAccount::class);
        $this->app->bind(AccountTypeRepository::class, EloquentAccountType::class);
        $this->app->bind(CityRepository::class, EloquentCity::class);
        $this->app->bind(CustomerRepository::class, EloquentCustomer::class);
        $this->app->bind(StatusRepository::class, EloquentStatus::class);
        $this->app->bind(TransactionRepository::class, EloquentTransaction::class);
        $this->app->bind(TransactionTypeRepository::class, EloquentTransactionType::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
