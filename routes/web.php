<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/view_event', [AdminController::class, 'view_event']);
Route::post('/add_event', [AdminController::class, 'add_event']);
Route::get('/delete_event/{id}',[AdminController::class, 'delete_event']);
Route::get('/view_addEvent',[AdminController::class, 'view_addEvent']);
Route::post('/event_add', [AdminController::class, 'event_add']);
Route::get('/show_events',[AdminController::class, 'show_events']);
Route::get('/delete_events/{id}',[AdminController::class, 'delete_events']);
Route::get('/update_events/{id}',[AdminController::class, 'update_events']);
Route::post('/update_events_confirm/{id}',[AdminController::class, 'update_events_confirm']);
Route::get('/event_details/{id}',[HomeController::class, 'event_details']);
Route::post('/get_tickets/{id}',[HomeController::class, 'get_tickets']);
Route::get('/show_tickets',[HomeController::class, 'show_tickets']);