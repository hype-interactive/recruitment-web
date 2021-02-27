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
    return view('home');
});

Route::get('application_panel/{id}','App\Http\Controllers\ApplicationController@showPanel')->name('application_panel');
Route::get('/about_us',function (){ return view('about_us');})->name('about_us');
Route::get('/services',function (){ return view('services');})->name('services');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('jobs','App\Http\Controllers\JobPostController@getJobPosts')->name('job_posts');
Route::get('job/{id}','App\Http\Controllers\JobPostController@getJobPost')->name('job_post');
Route::get('search_jobs/{str?}','App\Http\Controllers\JobPostController@searchJobs');


// admin routes


Route::get('job-post','App\Http\Controllers\Admin\JobPostController@getJobPosts')->name('admin.job_posts');
Route::post('add-job-post','App\Http\Controllers\Admin\JobPostController@addJobPost')->name('admin.add_job_post');
Route::get('add-job-post','App\Http\Controllers\Admin\JobPostController@createJobPost')->name('admin.create_job_post');
Route::get('post/{id}','App\Http\Controllers\Admin\JobPostController@getJobPost')->name('admin.post');
Route::get('application/{id}','App\Http\Controllers\Admin\ApplicationController@getApplication')->name('admin.application');
Route::get('edit_post_panel/{id}','App\Http\Controllers\Admin\JobPostController@showEditPostPanel')->name('admin.edit_post_panel');
Route::post('edit_post','App\Http\Controllers\Admin\JobPostController@editJobPost')->name('admin.edit_job_post');
Route::get('/admin/application_search/{str?}','App\Http\Controllers\Admin\ApplicationController@searchApplication' );
Route::get('/admin/dashboard','App\Http\Controllers\Admin\JobPostController@show')->name('admin.dashboard');

