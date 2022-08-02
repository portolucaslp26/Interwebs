<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\URLController;
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

// rotue to create a new URL
Route::get('/url/create', function () {
    return view('create');
});

// route to store a new URL
Route::post('/url/store', 'URLController@store');

// route to get a single URL
Route::get('/url/{id}', 'URLController@getAccessUrl');

// route to update an existing URL
Route::post('/url/{id}/update', 'URLController@updateAccessUrl');

// route to delete an existing URL
Route::get('/url/{id}/delete', 'URLController@destroy');

// route to get all URLs
Route::get('/url', 'URLController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
