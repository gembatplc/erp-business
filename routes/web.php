<?php


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Livewire\Brand\Brand;
use App\Http\Livewire\Shift\Shift;
use Illuminate\Support\Collection;
use App\Http\Livewire\Sale\AddSale;
use App\Http\Livewire\Branch\Branch;
use App\Http\Livewire\Sale\SaleList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Account\Account;
use App\Http\Livewire\Expense\Expense;
use App\Http\Livewire\Holiday\Holiday;
use App\Http\Livewire\Leave\ListLeave;
use App\Http\Controllers\HomeController;

use App\Http\Livewire\Category\Category;
use App\Http\Livewire\Leave\CreateLeave;


use App\Http\Livewire\Department\Department;
use App\Http\Livewire\Employeer\AddEmployee;
use App\Http\Livewire\Employeer\EmployeeList;
use App\Http\Livewire\Designation\Designation;
use App\Http\Livewire\Leave\LeaveType\LeaveType;
use App\Http\Livewire\Account\AccountType\AccountType;
use App\Http\Livewire\Expense\ExpenseType\ExpenseType;
use App\Http\Livewire\Account\MoneyTransfer\MoneyTransfer;
use App\Http\Livewire\Attendance\CreateAttendance;
use App\Http\Livewire\Attendance\ListAttendance;
use App\Http\Livewire\Currency\Currency;
use App\Http\Livewire\Customer\CreateCustomer;
use App\Http\Livewire\Customer\CustomerGroup\CustomerGroup;
use App\Http\Livewire\Customer\ListCustomer;
use App\Http\Livewire\Payroll\Allowance\CreateAllowance;
use App\Http\Livewire\Payroll\Allowance\ListAllowance;
use App\Http\Livewire\Payroll\CreatePayroll;
use App\Http\Livewire\Payroll\Deduction\CreateDeduction;
use App\Http\Livewire\Payroll\Deduction\ListDeduction;
use App\Http\Livewire\Payroll\ListPayroll;
use App\Http\Livewire\Supplier\CreateSupplier;
use App\Http\Livewire\Supplier\ListSupplier;
use App\Http\Livewire\Supplier\SupplierGroup\SupplierGroup;
use App\Http\Livewire\Tax\Tax;
use App\Http\Livewire\Warehouse\Warehouse;

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



 Route::get('/department',Department::class)->middleware('auth')->name('department');
 Route::get('/designation',Designation::class)->middleware('auth')->name('designation');
 Route::get('/branch',Branch::class)->middleware('auth')->name('branch');
 

 Route::get('/leave-type',LeaveType::class)->middleware('auth')->name('leave_type');
 Route::get('/leave-list',ListLeave::class)->middleware('auth')->name('leave_list');
 Route::get('/leave-create',CreateLeave::class)->middleware('auth')->name('leave_create');

 Route::get('/shift',Shift::class)->middleware('auth')->name('shift');
 Route::get('holiday',Holiday::class)->middleware('auth')->name('holiday');


 Route::get('/attendance-create',CreateAttendance::class)->middleware('auth')->name('attendance_create');
 Route::get('/attendance-list',ListAttendance::class)->middleware('auth')->name('attendance_list');


 Route::get('/allowance-create',CreateAllowance::class)->middleware('auth')->name('allowance_create');
 Route::get('/allowance-list',ListAllowance::class)->middleware('auth')->name('allowance_list');


 Route::get('/deduction-create',CreateDeduction::class)->middleware('auth')->name('deduction_create');
 Route::get('/deduction-list',ListDeduction::class)->middleware('auth')->name('deduction_list');


 Route::get('/payroll-create',CreatePayroll::class)->middleware('auth')->name('payroll_create');
 Route::get('/payroll-list',ListPayroll::class)->middleware('auth')->name('payroll_list');

 Route::get('/brand',Brand::class)->name('brand');
 Route::get('/category',Category::class)->middleware('auth')->name('category');
 Route::get('/warehouse',Warehouse::class)->name('warehouse');
 Route::get('/currency',Currency::class)->name('currency');
 Route::get('/tax',Tax::class)->name('tax');

 Route::get('sale-list',SaleList::class)->middleware('auth')->name('sale.list');
 Route::get('add-sale',AddSale::class)->middleware('auth')->name('add.sale');

 Route::get('customer-group',CustomerGroup::class)->middleware('auth')->name('customer.group');
 Route::get('customer-create',CreateCustomer::class)->middleware('auth')->name('customer_create');
 Route::get('customer-list',ListCustomer::class)->middleware('auth')->name('customer_list');

 
 Route::get('employee-list',EmployeeList::class)->middleware('auth')->name('employee_list');
 Route::get('employee-create',AddEmployee::class)->middleware('auth')->name('employee_create');

 Route::get('supplier-group',SupplierGroup::class)->middleware('auth')->name('supplier.group');
 Route::get('supplier-create',CreateSupplier::class)->middleware('auth')->name('supplier_create');
 Route::get('supplier-list',ListSupplier::class)->middleware('auth')->name('supplier_list');

 Route::get('account-type',AccountType::class)->middleware('auth')->name('account_type');
 Route::get('account',Account::class)->middleware('auth')->name('account');
 Route::get('money-transfer',MoneyTransfer::class)->middleware('auth')->name('money_transfer');


 Route::get('/expense-type',ExpenseType::class)->middleware('auth')->name('expense_type');
 Route::get('/expense',Expense::class)->middleware('auth')->name('expense');