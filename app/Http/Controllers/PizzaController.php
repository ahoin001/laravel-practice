<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PizzaController extends Controller
{

     /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = DB::select('select * from employees LIMIT 6;');
        // foreach ($users as $user) {
        //     echo $user->first_name;
        // }

        //* while they're still rows to pull off the rows from result, print them all out 
 

        return view('showdbinfo', ['employees' => $users]);
    }


}
