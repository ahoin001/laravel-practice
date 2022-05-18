<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\EmployeeController;
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
});



Route::get('/employees',[EmployeeController::class, 'allEmployees']);

// * Will give rout parameter to controller to use
Route::get('/employee/unique/{employeeId}',[EmployeeController::class, 'uniqueEmployee'])->name('employeeDetails');

Route::get('employee/addAnEmployee',function(){
    return view('employee_form');
} )->name('newEmployee');

Route::get('employee/editemployeeinfo/{employeeId}',[EmployeeController::class,'getEmployeeForEdit'])->name('editEmployeeInfo');

Route::post('employee/insertEmployee',[EmployeeController::class, 'createEmployee']);

Route::delete('employee/delete/{employeeId}',[EmployeeController::class,'destroy'] )->name('deleteEmployee');

Route::put('employees/updateEmployee/{employeeId}',[EmployeeController::class,'updateEmployee'])->name('modifyEmployee');



