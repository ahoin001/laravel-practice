<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
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
Route::get('/withdb', [PizzaController::class, 'index'] );

Route::redirect('/here', '/pizzas', 301);

Route::get('/pizzas', function () {

    // * Grab values from req param
    $pizza_type = request('pizza_type');

    $pizza = ['pizza_name' => '','type'=>$pizza_type,'base'=>'cheese','price'=>18];

    // * Can pass data through route by passing a variable through second argument in view
    return view('pizzas',$pizza);
})->name('favoritepizza');

//* Example of getting data through url query req
Route::get('/pizzas/{pizza_name}', function ($pizza_name) {

    $pizza = ['pizza_name' => $pizza_name,'type'=>'Crust','base'=>'cheese','price'=>18];

    return view('pizzas',$pizza);
})->name('mypizza');