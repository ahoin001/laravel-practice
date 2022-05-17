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
        $salary = floatval(request('salary'));

        error_log(request('first_name'));
        error_log(request('last_name'));
        error_log(request('job_title'));
        error_log(request('salary'));

        // ? Query Builder way, but I like making raw queries also
        $id = DB::table('employees')->insert(
            ['employee_id'=>1, 'first_name' => $firstName, 'last_name' => $lastName, 
            'job_title'=>$jobTitle,'salary'=>$salary,'reports_to'=>37270,
            'office_id'=>1]
        );

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
