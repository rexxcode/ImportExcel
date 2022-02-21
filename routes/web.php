<?php

use App\Imports\UsersImport;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Facades\Excel;


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


Route::get('/',function(){
    $user = User::all();
    return view('welcome',['user' => $user]);

});

Route::post('/', function () {
    
    Excel::import(new UsersImport, request()->file('file'));
  
    return redirect()->back();
});

