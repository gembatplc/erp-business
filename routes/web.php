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
use App\Models\LeaveType as ModelsLeaveType;

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


Route::post('testing',function(Request $request){
    $names =  $request->input('name');
    $max_counts = $request->input('max_count');
    $leave_intervals = $request->input('leave_interval');
    $descriptions = $request->input('description');

    foreach($names as $name_key => $name){
        $n = ModelsLeaveType::find($name_key);
        $n->name = $name;
        $n->update();
    }

    foreach($max_counts as $count_key => $max_count){
        $mc = ModelsLeaveType::find($count_key);
        $mc->max_leave_count = $max_count;
        $mc->update();
    }

    foreach($leave_intervals as $leave_key => $leave_interval){
        $li = ModelsLeaveType::find($leave_key);
        $li->leave_count_interval = $leave_interval;
        $li->update();
    }

    foreach($descriptions as $desc_key => $description){
        $ds = ModelsLeaveType::find($desc_key);
        $ds->description = $description;
        $ds->update();
    }

    return back()->with('success','Leave Types Has Been Successfully updated!!');
})->name('testing');