<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BookingController;
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

Route::get('/login', function () {
    return view('admin.login');
})->name('admin.login');


Route::get('/home',  [HomeController::class, 'index'])->name('homepages'); 
Route::get('/aboutus',  [HomeController::class, 'abotsus'])->name('aboutus'); 
    
Route::get('/test/{id}/{name}',[HomeController::class, 'test'])->whereNumber('id')->whereAlpha('name')->middleware('test');   



//Admin
Route::middleware('auth')->prefix('admin')->group(function () {

     Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');
     # Booking
     Route::get('booking', [\App\Http\Controllers\Admin\BookingController::class, 'index'])->name('admin_booking');
     Route::get('booking/add', [\App\Http\Controllers\Admin\BookingController::class, 'add'])->name('admin_booking_add');
     Route::post('booking/create', [\App\Http\Controllers\Admin\BookingController::class, 'create'])->name('admin_booking_create');
     Route::get('booking/edit/{id}', [\App\Http\Controllers\Admin\BookingController::class, 'edit'])->name('admin_booking_edit');
     Route::post('booking/update/{id}', [\App\Http\Controllers\Admin\BookingController::class, 'update'])->name('admin_booking_update');
     Route::get('booking/delete/{id}', [\App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('admin_booking_delete');
     Route::get('booking/show', [\App\Http\Controllers\Admin\BookingController::class, 'show'])->name('admin_booking_show');
});

Route::get('/admin', [HomeController::class, 'index'])->name('admin_home');

Route::get('/admin/login', [HomeController::class, 'login'])->name('admin_login');
Route::post('/admin/logincheck', [HomeController::class, 'logincheck'])-> name ('admin_logincheck');
Route::get('/admin/logout', [HomeController::class, 'logout'])->name('logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
