<?php

use App\Http\Controllers\LawController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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

//Route::get('/', 'PagesController@index')->middleware('auth');



  Route::resource('student', 'StudentController');
  Route::resource('purchase-order', 'PurchaseOrderController');
  Route::resource('department', 'DepartmentController');
  Route::resource('branch', 'BranchController');
  Route::resource('company', 'CompanyController');


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Auth::routes();
Route::get('/home', 'PagesController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index','FRontendController@constitution');
Route::get('/','FRontendController@home1');
Route::get('/constitution','FRontendController@constitution');
Route::get('/enactment','FRontendController@enactment');
Route::get('/decree','FRontendController@decree');
Route::get('/royal_enactment','FRontendController@royal_enactment');
Route::get('/ministry','FRontendController@ministry');
Route::get('/regularity','FRontendController@regularity');
Route::get('/rules','FRontendController@rules');
Route::get('/declare','FRontendController@declare');
Route::get('/dictation','FRontendController@dictation');
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
Route::get('/lawyer', function(){
    return View('pages.lawyer.index');
 });
Route::get('/test','FRontendController@home1');


//backend
Route::group(['middleware' => 'auth'], function () {
//นิติกร
Route::resource('/law','LawController');
Route::resource('/check','CheckController');
Route::get('/report','ReportController@index');
Route::get('report/pdf','ReportController@store');
Route::get('report/excel','ReportController@show');

//lawyer
Route::resource('/lawyer','LawyerController');
Route::get('/lawyerreport','LawyerreportController@index');
Route::get('report/lawyer','LawyerreportController@store');
Route::get('report/excel1','LawyerreportController@show');
Route::get('/draft','LawyerController@create');
//Route::post('/draft/save','DraftController@store');
});

Route::get('auth/callback', 'AuthController@callbackYRUPassport')->name('auth.callbackYRUPassport');
Route::get('auth/logout', 'AuthController@logout')->name('auth.logout');


