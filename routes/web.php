<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
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

Route::get('/login', function () {
    if(Auth::check()) {
        return back();
    }
    return view('login');
});

Route::get('/register', function () {
    if(Auth::check()) {
        return back();
    }
    return view('register');
});

Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return Redirect('/login');
});

Route::post('/register', [UserController::class,'register']);
Route::post('/login', [UserController::class,'login']);
Route::get('/addNewService', [ServiceController::class, 'addNewService']);
Route::post('/createService', [ServiceController::class, 'createService']);
Route::get('/showServiceDetail/{id}', [ServiceController::class, 'showServiceDetail']);
Route::post('/search', [ServiceController::class, 'search']);
Route::post('/add_to_booking', [ServiceController::class, 'addBooking']);
Route::get('/bookList', [ServiceController::class, 'bookList']);
Route::get('/confirmBooking/{id}', [ServiceController::class, 'confirmBooking']);
Route::post('/confirmInfo', [ServiceController::class, 'confirmInfo']);
Route::get('/cancelBookingList/{id}', [ServiceController::class, 'cancelBookingList']);
Route::get('/serviceDelete/{id}', [ServiceController::class, 'serviceDelete']);
Route::get('/serviceEdit/{id}', [ServiceController::class, 'serviceEdit']);
Route::post('/serviceUpdate/{id}', [ServiceController::class, 'serviceUpdate']);
Route::get('/', [ServiceController::class,'index']);
