<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

     /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */

    public function allEmployees() {
        $employees = DB::select('SELECT * FROM employees');
      
        return view('all_employees',["employees"=>$employees]);
    }

    public function uniqueEmployee($employeeId)
    {

        // $searchedEmployee = DB::findOrFail($employeeId);
       

        $searchForEmployeeResult = DB::table('employees')
                                    ->where('employee_id', '=' , $employeeId)
                                    ->get();

        //  dd($searchForEmployeeResult[0]);

        // ? Should I do raw SQL queries or use QueryBuilder?
        // DB::select(
        // 'SELECT * 
        // FROM employees 
        // WHERE employee_id = $employeeId');
        
        $searchedEmployee = $searchForEmployeeResult[0];

        return view('employee_record',["employee"=>$searchedEmployee]);
    }

}
