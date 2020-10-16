<?php

use Illuminate\Support\Facades\Route;

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
$groupData=[
    'namespace' => 'Client',
    'prefix' => '/'
];
Route::group($groupData, function(){
    $methods=['index','edit','update','create','store'];
    Route::resource('/client','ClientController')
        ->only($methods)
        ->names('client');

});

