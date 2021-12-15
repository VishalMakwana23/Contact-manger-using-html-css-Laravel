<?php

use App\Http\Controllers\contactController;
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
    return view('contactManager');
});

// display data
Route::get('/',[contactController::class,'getData']);
// insert data
Route::post('/submit',[contactController::class,'save']);
//delete data
Route::get('/delete/{id}',[contactController::class,'deleteData']);