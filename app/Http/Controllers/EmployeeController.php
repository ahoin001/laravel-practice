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

    public function uniqueEmployee()
    {
        // $employee = DB::statement('SELECT * FROM employees WHERE employee_id = 33391');

        $result = DB::select(
        'SELECT * 
        FROM employees 
        WHERE employee_id = 33391');
        // dd($result);
        $employee = $result[0];
        
        return view('employee_record',["employee"=>$employee]);
    }

}
