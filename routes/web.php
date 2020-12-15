<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PriceSetupController;
use App\Http\Controllers\NumberLimitController;
use App\Http\Controllers\LotteryRewardController;
use App\Http\Controllers\LotteryBetController;
use App\Http\Controllers\CheckBetCorrectController;
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
Route::get('/test', function () {
    return view('test');
});

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

    Route::get('/lottery-reward', [LotteryRewardController::class, 'index'])->name('lottery-reward');

    Route::get('/lottery-bet', [LotteryBetController::class, 'index'])->name('lottery-bet');

    Route::get('/check-bet-correct',[CheckBetCorrectController::class, 'index'])->name('check-bet-correct');
});




