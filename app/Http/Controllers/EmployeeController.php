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

    public function createEmployee() {

        $firstName = request('first_name');
        $lastName = request('last_name');
        $jobTitle = request('job_title');
        $salary = request('salary');

        error_log(request('first_name'));
        error_log(request('last_name'));
        error_log(request('job_title'));
        error_log(request('salary'));

        DB::insert('INSERT into empployees 
                    (employee_id, first_name,last_name,job_title,salary,reports_to,office_id) 
                    VALUES (DEFAULT,?, ?,?,?,?,?)', 
                    [$firstName,$lastName,$jobTitle,$salary,37270,1]);

        return view('welcome');
    }

    public function uniqueEmployee($employeeId)
    {

        $searchForEmployeeResult = DB::table('employees')
                                    ->where('employee_id', '=' , $employeeId)
                                    ->get();

        //  dd($searchForEmployeeResult[0]);
 
        $searchedEmployee = $searchForEmployeeResult[0];

        return view('employee_record',["employee"=>$searchedEmployee]);
    }

}
