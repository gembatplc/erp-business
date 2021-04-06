<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Department\Department;
use App\Http\Livewire\Designation\Designation;

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
    return view('welcome');
})->name('welcome');



Auth::routes();

Route::get('/home',
 [App\Http\Controllers\HomeController::class, 'index'])->name('home');


 Route::get('/department',Department::class)->middleware('auth');
 Route::get('/designation',Designation::class)->middleware('auth');


