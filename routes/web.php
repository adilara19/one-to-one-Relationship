<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('create', [CustomerController::class, 'create']);
Route::get('bill', [CustomerController::class, 'bill']);
Route::get('updateOrder', [CustomerController::class, 'updateOrder']);
Route::get('updateBill', [CustomerController::class, 'updateBill']);
Route::get('read', [CustomerController::class, 'read']);
Route::get('deleteOrder', [CustomerController::class, 'deleteOrder']);
Route::get('deleteCustomer', [CustomerController::class, 'deleteCustomer']);
Route::get('deleteBill', [CustomerController::class, 'deleteBill']);