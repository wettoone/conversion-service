<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyRateController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get_country_rates/{rate_country1}/{rate_country2}', [CurrencyRateController::class, 'conversion']);

Route::get('exchange_rates/{id}', [CurrencyRateController::class, 'getExchangeRates']);
