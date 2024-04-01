<?php

use App\Http\Controllers\OrderDataController;
use App\Http\Controllers\ConsignmentController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\BalanceAccountController;
use App\Http\Controllers\RecentAccountTransactionController;
use App\Http\Controllers\StatementsController;
use App\Http\Controllers\Reports\TransactionCountController;
use App\Http\Controllers\Reports\OutOfTownTransactionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('order-data', OrderDataController::class);

Route::post('consignment', ConsignmentController::class);
Route::post('withdrawal', WithdrawalController::class);
Route::get('balance/{account}', BalanceAccountController::class);
Route::get('recent-transaction/{account}', RecentAccountTransactionController::class);
Route::get('statements/{account}', StatementsController::class);

Route::prefix('reports')->group(function () {
    Route::get('transaction-customers', TransactionCountController::class);
    Route::get('out-of-town-transaction', OutOfTownTransactionsController::class);
});