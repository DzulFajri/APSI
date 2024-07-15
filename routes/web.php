<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('about', 'about')->name('about');

    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('order', [OrderController::class, 'store'])->name('order.store');
    Route::get('order/{order}/edit', [OrderController::class, 'edit'])->name('order.edit');
    Route::put('order/{order}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/orders/report/pdf', [OrderController::class, 'generatePDF'])->name('orders.report.pdf');

});

Route::post('/order/submit', [FormController::class, 'submitOrder'])->name('order.submit');
Route::get('/after-whatsapp', [FormController::class, 'afterWhatsApp'])->name('after-whatsapp');

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

require __DIR__.'/auth.php';
