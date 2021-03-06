<?php

use App\Http\Controllers\TemperatureController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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

Route::get('/run-migrations', function () {
    Artisan::call('migrate', ["--force" => true]);
    Artisan::call('db:seed');
    return;
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['prefix' => 'temperature'], function () {
    Route::get('current', [TemperatureController::class, 'current'])->name('currenttemp')->middleware('auth');
});
