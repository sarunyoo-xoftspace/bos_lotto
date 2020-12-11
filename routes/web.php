<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PriceSetupController;
use App\Http\Controllers\NumberLimitController;

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
    return redirect(route("login"));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name("home");

    Route::get('/price-setups',[PriceSetupController::class, 'index'])->name('price-setups');

    Route::get('/number-limit',[NumberLimitController::class, 'index'])->name('number-limit');
});




