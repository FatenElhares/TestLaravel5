<?php

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


//Route::get('/helloworld', function () {
//    return view('helloworld');
//});


//Administrateur
Route::get('/AdminController1', 'AdminController@StageManagement');
Route::get('/AdminController2', 'AdminController@HopitalManagement');
Route::get('/AdminController3', 'AdminController@EtudiantManagement');
Route::get('/AdminController4', 'AdminController@EnseignantManagement');

// Enseignant
Route::get('/EnseigController', 'EnseigController@StageManagement');
Route::get('/EnseigController', 'EnseigController@CompetancesManagement');

//Just for TESSSSSSSSST


Route::get('/TestController', 'TestController@test');
