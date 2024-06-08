<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/mining', [homepageController::class, 'mining'])->name('mining');
Route::get('/invest', [homepageController::class, 'invest'])->name('invest');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {


    // users
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware(['verified']);


    Route::get('/dashboard/deposit', [UserController::class, 'deposit'])->name('user.deposit');
    Route::post('/dashboard/deposit/user', [UserController::class, 'deposits'])->name('user.deposits');



    Route::get('/dashboard/withdraw', [UserController::class, 'withdraw'])->name('user.withdraw');
    Route::post('/dashboard/withdraw/user', [UserController::class, 'withdraws'])->name('user.withdraws');




    Route::get('/dashboard/investment', [UserController::class, 'investment'])->name('user.investment');

    Route::post('/investments/{investment}', [UserController::class, 'invest']) ->name('investments.invest');



    Route::get('/dashboard/deposit-history', [UserController::class, 'deposithistory'])->name('deposit');


    Route::get('/dashboard/withdrawal-history', [UserController::class, 'withdrawalhistory'])->name('withdrawal');

    Route::get('//dashboard/history', [UserController::class, 'history'])->name('investments.history');
    Route::post('//dashboard/unstake/{historyId}', [UserController::class, 'unstake'])->name('investments.unstake');



    // admin



});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'admin'])->name('admin')->middleware(['verified']);



    Route::get('/dashboard/admin/deposit', [AdminController::class, 'deposit'])->name('admin.deposit');
    Route::put('/dashboard/admin/status/{id}', [AdminController::class, 'updateStatus'])->name('admin.status');



    Route::get('/dashboard/admin/withdrawal', [AdminController::class, 'withdrawal'])->name('admin.withdraw');
    Route::put('/dashboard/admin/statu/{id}', [AdminController::class, 'updatewithdraw'])->name('admin.withdrawals');


    Route::get('/dashboard/admin/investment', [AdminController::class, 'investment'])->name('admin.investment');
    Route::post('/dashboard/admin/submit', [AdminController::class, 'investments'])->name('admin.submit');



    Route::get('/dashboard/admin/payment', [AdminController::class, 'payment'])->name('admin.payment');
    Route::post('/dashboard/admin/payments/update', [AdminController::class, 'payments'])->name('admin.payments');
    Route::delete('/dashboard/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');



    Route::get('/dashboard/admin/details{id}', [AdminController::class, 'details'])->name('admin.details');
    Route::post('/dashboard/admin/update{id}', [AdminController::class, 'update'])->name('admin.update');
});

require __DIR__ . '/auth.php';
