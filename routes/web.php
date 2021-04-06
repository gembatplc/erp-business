<?php


use Illuminate\Http\Request;
use App\Http\Livewire\Brand\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Branch\Branch;
use App\Http\Livewire\Department\Department;
use App\Http\Livewire\Designation\Designation;
use App\Http\Livewire\ExpenseType\ExpenseType;

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


//  Route::get('/department',Department::class);
 Route::get('/brand',Brand::class);
 Route::get('/department',Department::class)->middleware('auth');
 Route::get('/designation',Designation::class)->middleware('auth');
 Route::get('/branch',Branch::class)->middleware('auth');
 Route::get('/expense-type',ExpenseType::class)->middleware('auth');


