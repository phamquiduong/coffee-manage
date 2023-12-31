<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodGroupController;
use App\Http\Controllers\FoodManageController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffManageController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MyUserController::class, 'login_get']);
Route::post('/', [MyUserController::class, 'login_post']);

Route::get('/logout', function () {
    return redirect('/')->withCookie(Cookie::forget('phone_number'));
});

Route::get('/users', [StaffManageController::class, 'index']);
Route::post('/users', [StaffManageController::class, 'create']);
Route::delete('/users/{id}', [StaffManageController::class, 'destroy']);
Route::patch('/users/{id}', [StaffManageController::class, 'update']);

Route::get('/foods_groups', [FoodGroupController::class, 'index']);
Route::post('/foods_groups', [FoodGroupController::class, 'create']);
Route::delete('foods_groups/{id}', [FoodGroupController::class, 'destroy']);
Route::patch('foods_groups/{id}', [FoodGroupController::class, 'update']);

Route::get('/foods', [FoodController::class, 'index']);
Route::post('/foods', [FoodController::class, 'create']);
Route::delete('foods/{id}', [FoodController::class, 'destroy']);
Route::patch('foods/{id}', [FoodController::class, 'update']);

Route::get('/orders', [OrdersController::class, 'index']);
Route::get('/orders/statistics_by_month', [OrdersController::class, 'statistics_by_month']);
Route::get('/orders/statistics_by_year', [OrdersController::class, 'statistics_by_year']);

Route::get('staff/order', [StaffController::class, 'order_food']);
Route::post('staff/order', [StaffController::class, 'ordering']);

Route::get('staff/orders', [StaffController::class, 'order_list']);
Route::get('/make_ordered/{order_id}', [StaffController::class, 'make_ordered']);

