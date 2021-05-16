<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('courses', CourseController::class);

Route::post('/courseusers/store/{course}', [CourseUserController::class, 'store']);
Route::get('/courseusers/show/{courseUser}', [CourseUserController::class, 'show']);

Route::post('/discounts/check/{code}', [DiscountController::class, 'check']);

Route::post('/transactions/store/{courseUser}', [TransactionController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index']);