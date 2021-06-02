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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'LoginController@index');
Route::get('/menu', 'LoginController@ToMenu');
Route::get('/afficher_liste', 'PersonneControler@afficherListerVolontaire');
Route::get('/insertVolontaire', 'registerController@index');
Route::get('/updateVolontaire/{id}', 'PersonneControler@afficherVueModif');
Route::post('/singup', 'LoginController@login');
Route::post('/inserer_Volontaire', 'PersonneControler@insererVolontaire');
Route::post('/insererFormVolontaire', 'PersonneControler@insererFomrVolontaire');
Route::post('/modifierFormVolontaire', 'PersonneControler@modifier_Volontaire');
