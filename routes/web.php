<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
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


Route::group(['middleware'=>'auth'],function () {
//    Route::get('/', 'HomeController@index');
    //user
    Route::get('/create-user', 'HomeController@createUser');
    Route::get('/edit-user/{id}', 'HomeController@editUser');
    Route::get('/user-delete/{id}', 'HomeController@deleteUser');
    Route::post('/add-user', 'HomeController@addUser');
    Route::post('/update-user', 'HomeController@updateUser');
    Route::get('/users', 'HomeController@allUser');
    Route::get('/admin-add/{id}', 'HomeController@addAdmin');
    Route::get('/admin-remove/{id}', 'HomeController@removeAdmin');
    //customer
    Route::get('/create-customer', 'CustomerController@create');
    Route::get('/edit-customer/{id}', 'CustomerController@edit');
    Route::get('/customer-delete/{id}', 'CustomerController@destroy');
    Route::post('/add-customer', 'CustomerController@store');
    Route::post('/update-customer', 'CustomerController@update');
    Route::get('/customers', 'CustomerController@show');
    //customer Add with ajax
    Route::resource('customer-add', 'CustomerAddController');

    Route::post('customer-add/update', 'CustomerAddController@update')->name('customer-add.update');

    Route::get('customer-add/destroy/{id}', 'CustomerAddController@destroy');

    Route::get('create-plo-generation', 'PloGenerationController@create');
    Route::post('add-plo-generation', 'PloGenerationController@createCloGeneration');
    Route::post('save-plo-generation', 'PloGenerationController@store');
    Route::get('plo-table-search', 'PloGenerationController@ploTableSearch');
    Route::post('get-plo-generation-table', 'PloGenerationController@ploTableDataGet');
    Route::get('/create/course','CoursesController@create')->name('course.create');
    Route::post('/create/store','CoursesController@store')->name('course.store');

    Route::get('/enroll/course','CoursesController@showEnroll')->name('enroll.course');
    Route::post('/enroll/course','CoursesController@enroll')->name('post.enroll.course');

});

Route::get('/login','LoginController@index')->name('login');
Route::get('/register','LoginController@registerIndex')->name('register');
Route::post('/login-action','LoginController@login')->name('login-action');
Route::post('/register-action','LoginController@register')->name('register-action');

Route::get('/logout','LoginController@logout')->name('logout');

Route::get('upload-file', function () {
    return view('upload');
});
Route::post('uploade-data', function () {
    if(request()->has('csv_file')){

        $data = array_map('str_getcsv', file(request()->csv_file));
        $header = $data[0];
        return $header;

    }
    else{
        return 'upload_csv file first';
    }
});


