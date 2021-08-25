<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


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


Route::get('/', 'MainController@index');
Route::get('dashboard', 'MainController@home');
Route::get('login', 'MainController@login');
Route::get('compose_sms', 'MainController@compose');
Route::get('upload_contacts', 'MainController@uploadContact');

Route::post('Register', 'MainController@register');
Route::post('Login', 'MainController@loginuser');
// Route::post('Login', 'MainController@loginuser');

//Route::get('contact', 'MainController@Contact');
Route::get('upload', 'UploadExcel@excel')->name('excel');