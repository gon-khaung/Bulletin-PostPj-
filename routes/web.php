<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User
Route::get('index', 'UserController@index')->name('index');
Route::get('contact', 'UserController@contact')->name('contact_page');
Route::get('user_profile', 'UserController@user_profile')->name('userprofile_page');

// Create News
Route::post('insert_news', 'UserController@insert_news')->name('insert_news');

// chang password
Route::post('change_password', 'UserController@chg_pass')->name('chg_pass');

// Insert contact
Route::post('insert_contact', 'UserController@insert_contact')->name('insert_contact');

// Admin
Route::get('admin_home', 'AdminController@admin_home')->name('admin_home');

// Admin contact
Route::get('admin_contact', 'AdminController@admin_contact')->name('adminContact_page');
Route::get('admin_contact_delete/{id}', 'AdminController@admin_contact_delete');

// Admin User
Route::get('admin_user', 'AdminController@admin_user')->name('adminUser_page');
Route::get('admin_user_delete/{id}', 'AdminController@admin_user_delete');
Route::post('admin_user_create', 'AdminController@admin_user_create')->name('admin_user_create');
Route::get('admin_user_edit/{id}', 'AdminController@admin_user_edit');
Route::post('admin_user_edit', 'AdminController@admin_user_editId');

// Admin premium
Route::get('admin_premium', 'AdminController@admin_premium')->name('adminPremium_page');
Route::get('admin_premium_edit/{id}', 'AdminController@admin_premiumEdit')->name('adminPremiumEdit_page');
Route::post('admin_premium_edit', 'AdminController@admin_premiumEditID')->name('adminPremiumEditpage');
Route::post('admin_premium_create', 'AdminController@admin_premiumCreate')->name('adminPremiumCreate_page');
Route::get('admin_premium_delete/{id}', 'AdminController@admin_premiumDelete')->name('adminPremiumDelete_page');
