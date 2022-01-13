<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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
    return view('home.index');
});

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/process', [PaymentController::class, 'paymentProcess'])->name('payment.process');

Route::get('/payment/success', function () {
    return redirect()->route('payment.index')->with('success', 'Payment successed');
})->name('payment.success');

Route::get('/payment/cancel', function () {
    return redirect()->route('payment.index')->with('cancel', 'Payment cancelled');
})->name('payment.cancel');
