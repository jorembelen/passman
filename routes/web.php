<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginSecurityController;
use App\Http\Livewire\Accounts\Index;
use App\Http\Livewire\UserProfile;
use App\Http\Livewire\UsersList;
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


Auth::routes();

Route::group(['middleware' => ['auth', '2fa']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/accounts', Index::class)->name('accounts');
    Route::get('/users', UsersList::class)->name('users');
    Route::get('/user-profile', UserProfile::class)->name('profile');

});

Route::group(['prefix'=>'2fa'], function(){
    Route::get('/',[LoginSecurityController::class, 'show2faForm'])->name('show2fa');
    Route::get('/disable-2fa',[LoginSecurityController::class, 'disable'])->name('disable-2fa');
            Route::post('/generateSecret',[LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret');
            Route::post('/enable2fa',[LoginSecurityController::class, 'enable2fa'])->name('enable2fa');
            Route::post('/disable2fa',[LoginSecurityController::class, 'disable2fa'])->name('disable2fa');

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});
