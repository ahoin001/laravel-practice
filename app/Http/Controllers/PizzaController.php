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
        $users = DB::select('select * from employees ');
        foreach ($users as $user) {
            echo $user->first_name;
        }
        return view('showdbinfo', ['employees' => $users]);
    }
}
