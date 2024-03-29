<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DemoController;
// use\Maatwebsite\Excel\Facades\Excel;
// use\App\Imports\ExcelImport;

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
Route::get('sms_sender', 'DemoController@index');//For testing
Route::post('sms_sender', 'DemoController@sendMessage');
Route::post('sms_sender/dlr', 'DemoController@deliveryReport');
Route::get('dashboard', 'MainController@home');
Route::get('login', 'MainController@login');
Route::get('compose_sms', 'MainController@compose');
Route::get('upload_contacts', 'MainController@uploadContact');

Route::post('Register', 'MainController@register');
Route::post('Login', 'MainController@loginuser');
// Route::post('Login', 'MainController@loginuser');

//Route::get('upload', 'MainController@excelview');
// Route::get('upload', 'UploadExcel@excel')->name('excel');
