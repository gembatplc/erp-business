<?php


use Illuminate\Http\Request;
use App\Http\Livewire\Brand\Brand;
use App\Http\Livewire\Branch\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Category\Category;
use App\Http\Livewire\LeaveType\LeaveType;
use App\Http\Livewire\Department\Department;
use App\Http\Livewire\Designation\Designation;
use App\Http\Livewire\ExpenseType\ExpenseType;
use App\Http\Livewire\Shift\Shift;
use App\Models\LeaveType as ModelsLeaveType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

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
 Route::get('/leave-type',LeaveType::class)->middleware('auth');
 Route::get('/category',Category::class)->middleware('auth');
 Route::get('/shift',Shift::class)->middleware('auth');
