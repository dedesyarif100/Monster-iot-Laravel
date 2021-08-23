<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

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

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', 'DashboardController@index')->name('index');
    });

    Route::prefix('truck-monitoring')->name('truck-monitoring.')->group(function () {
       Route::get('/','TruckMonitoringController@index')->name('index');
    });

    Route::view('contact', 'pages.contact')->name('contact');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/index', [UserController::class,'index'])->name('index');
        Route::get('/create', [UserController::class,'create'])->name('create');
        Route::post('/store', [UserController::class,'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class,'edit'])->name('edit');
        Route::patch('/update/{id}', [UserController::class,'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class,'destroy'])->name('destroy');
        // Route::resource('user', UserController::class);
    });

    Route::prefix('company')->name('company.')->group(function () {
        Route::get('/index', [CompanyController::class,'index'])->name('index');
        Route::get('/create', [CompanyController::class,'create'])->name('create');
        Route::post('/store', [CompanyController::class,'store'])->name('store');
        Route::get('/edit/{id}', [CompanyController::class,'edit'])->name('edit');
        Route::put('/update{id}', [CompanyController::class,'update'])->name('update');
        Route::delete('/destroy{id}', [CompanyController::class,'destroy'])->name('destroy');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
