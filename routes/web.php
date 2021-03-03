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



Route::get('application_panel/{id}','App\Http\Controllers\ApplicationController@showPanel')->name('application_panel');
Route::get('/about_us','App\Http\Controllers\BlogPostController@displayPost')->name('about_us');
Route::get('/services',function (){ return view('services');})->name('services');
Route::post('register_employer','App\Http\Controllers\EmployerController@create')->name('register_employer');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('jobs','App\Http\Controllers\JobPostController@getJobPosts')->name('job_posts');
Route::post('/site/search_job','App\Http\Controllers\JobPostController@getJobPosts')->name('search');
Route::get('job/{id}','App\Http\Controllers\JobPostController@getJobPost')->name('job_post');
Route::get('search_jobs/{str?}','App\Http\Controllers\JobPostController@searchJobs');


// admin routes


Route::post('add_category','App\Http\Controllers\Admin\JobCategoryController@addCategory')->name('admin.add_category');
Route::get('admin/job-posts','App\Http\Controllers\Admin\JobPostController@getJobPosts')->name('admin.job_posts');
Route::post('add-job-post','App\Http\Controllers\Admin\JobPostController@addJobPost')->name('admin.add_job_post');
Route::get('add-job-post','App\Http\Controllers\Admin\JobPostController@createJobPost')->name('admin.create_job_post');
Route::get('post/{id}','App\Http\Controllers\Admin\JobPostController@getJobPost')->name('admin.post');
Route::get('application/{id}','App\Http\Controllers\Admin\ApplicationController@getApplication')->name('admin.application');
Route::get('edit_post_panel/{id}','App\Http\Controllers\Admin\JobPostController@showEditPostPanel')->name('admin.edit_post_panel');
Route::post('edit_post','App\Http\Controllers\Admin\JobPostController@editJobPost')->name('admin.edit_job_post');
Route::get('/admin/application_search/{str?}','App\Http\Controllers\Admin\ApplicationController@searchApplication' );
Route::get('/admin/dashboard','App\Http\Controllers\Admin\JobPostController@show')->name('admin.dashboard');
Route::get('/admin/blog_posts','App\Http\Controllers\Admin\BlogPostController@show')->name('admin.blog_posts');
Route::get('/admin/add_blog_post_panel','App\Http\Controllers\Admin\BlogPostController@displayAddPostPanel')->name('admin.add_blog_post_panel');
Route::post('/admin/add_blog_post','App\Http\Controllers\Admin\BlogPostController@addPost')->name('admin.add_blog_post');
Route::get('/admin/edit_blog_post_panel/{id}','App\Http\Controllers\Admin\BlogPostController@displayEditPostPanel')->name('admin.edit_blog_post_panel');
Route::post('/admin/edit_blog_post','App\Http\Controllers\Admin\BlogPostController@editPost')->name('admin.edit_blog_post');


