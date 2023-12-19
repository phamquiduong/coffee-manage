<?php

use App\Http\Controllers\MyUserController;
use App\Http\Controllers\Staff;
use App\Http\Controllers\StaffManageController;
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
Route::delete('/users/{id,full_name}', [StaffManageController::class, 'destroy']);
Route::patch('/users/{id}', [StaffManageController::class, 'update'] );

