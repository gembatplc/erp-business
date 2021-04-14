<?php


use Illuminate\Http\Request;
use App\Http\Livewire\Brand\Brand;
use App\Http\Livewire\Branch\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Category\Category;
use App\Http\Livewire\Customer\CustomerList;
use App\Http\Livewire\LeaveType\LeaveType;
use App\Http\Livewire\Department\Department;
use App\Http\Livewire\Designation\Designation;
use App\Http\Livewire\ExpenseType\ExpenseType;
use App\Http\Livewire\Holiday\Holiday;
use App\Http\Livewire\Shift\Shift;
use App\Http\Livewire\Sale\SaleList;
use App\Http\Livewire\Sale\AddSale;
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


 Route::get('/brand',Brand::class)->name('brand');
 Route::get('/department',Department::class)->middleware('auth')->name('department');
 Route::get('/designation',Designation::class)->middleware('auth')->name('designation');
 Route::get('/branch',Branch::class)->middleware('auth')->name('branch');
 Route::get('/expense-type',ExpenseType::class)->middleware('auth')->name('expense_type');
 Route::get('/leave-type',LeaveType::class)->middleware('auth')->name('leave_type');
 Route::get('/category',Category::class)->middleware('auth')->name('category');
 Route::get('/shift',Shift::class)->middleware('auth')->name('shift');
 Route::get('holiday',Holiday::class)->middleware('auth')->name('holiday');
 Route::get('sale-list',SaleList::class)->middleware('auth')->name('sale.list');
 Route::get('add-sale',AddSale::class)->middleware('auth')->name('add.sale');
 Route::get('customer-list',CustomerList::class)->middleware('auth')->name('customer.list');