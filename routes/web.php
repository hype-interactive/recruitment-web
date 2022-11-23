<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();


Route::get('application_panel/{id}','App\Http\Controllers\ApplicationController@showPanel')->name('application_panel');
Route::get('about','App\Http\Controllers\BlogPostController@displayPost')->name('about_us');
Route::get('services',function (){ return view('/services');})->name('services');
Route::post('register_employer','App\Http\Controllers\EmployerController@create')->name('register_employer');
Route::post('add_application','App\Http\Controllers\ApplicationController@add')->name('add_document');

// Gallery routes
Route::get('gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('search_images/{q?}', [App\Http\Controllers\GalleryController::class, 'search']);

// Subscription to listed services
Route::post('subscribe_to_service', 'App\Http\Controllers\SubscriptionController@subscribe')->name('subscribe');



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('jobs','App\Http\Controllers\JobPostController@getJobPosts')->name('job_posts');
Route::post('search_job','App\Http\Controllers\JobPostController@getJobPosts')->name('search');
Route::get('job/{id}','App\Http\Controllers\JobPostController@getJobPost')->name('job_post');
Route::get('search_jobs/{str?}','App\Http\Controllers\JobPostController@searchJobs');
Route::get('blog_post/{id}','App\Http\Controllers\BlogPostController@getPost')->name('blog_post');
Route::post('update_user','App\Http\Controllers\UserController@update')->name('update_user');
Route::get('user/{id}','App\Http\Controllers\UserController@getUser')->name('user_profile');
Route::post('complete_user_profile','App\Http\Controllers\UserController@completeProfile')->name('complete_user_profile');
Route::post('reset_password','App\Http\Controllers\UserController@resetPassword')->name('reset_password');


// admin routes


Route::post('add_category','App\Http\Controllers\Admin\JobCategoryController@addCategory')->name('admin.add_category');
Route::post('add_region','App\Http\Controllers\Admin\RegionController@addRegion')->name('admin.add_region');

Route::get('admin/job-posts','App\Http\Controllers\Admin\JobPostController@getJobPosts')->name('admin.job_posts');
Route::post('add-job-post','App\Http\Controllers\Admin\JobPostController@addJobPost')->name('admin.add_job_post');
Route::get('create_job_posts_panel','App\Http\Controllers\Admin\JobPostController@createJobPostPanel')->name('admin.create_job_post_panel');
Route::get('post/{id}','App\Http\Controllers\Admin\JobPostController@getJobPost')->name('admin.post');
Route::get('/admin/application/{id}','App\Http\Controllers\Admin\ApplicationController@getApplication')->name('admin.application');
Route::get('edit_post_panel/{id}','App\Http\Controllers\Admin\JobPostController@showEditPostPanel')->name('admin.edit_post_panel');
Route::post('edit_post','App\Http\Controllers\Admin\JobPostController@editJobPost')->name('admin.edit_job_post');
Route::post('/admin/delete_job_post','App\Http\Controllers\Admin\JobPostController@deleteJobPost')->name('admin.delete_job_post');



Route::get('/admin/application_search/{str?}','App\Http\Controllers\Admin\ApplicationController@searchApplication' );
Route::get('/admin/dashboard','App\Http\Controllers\Admin\JobPostController@show')->name('admin.dashboard');

Route::get('/admin/blog_posts','App\Http\Controllers\Admin\BlogPostController@show')->name('admin.blog_posts');
Route::get('/admin/add_blog_post_panel','App\Http\Controllers\Admin\BlogPostController@displayAddPostPanel')->name('admin.add_blog_post_panel');
Route::post('/admin/add_blog_post','App\Http\Controllers\Admin\BlogPostController@addPost')->name('admin.add_blog_post');
Route::get('/admin/edit_blog_post_panel/{id}','App\Http\Controllers\Admin\BlogPostController@displayEditPostPanel')->name('admin.edit_blog_post_panel');
Route::post('/admin/edit_blog_post','App\Http\Controllers\Admin\BlogPostController@editPost')->name('admin.edit_blog_post');
Route::post('/admin/delete_blog_post','App\Http\Controllers\Admin\BlogPostController@deletePost')->name('admin.delete_blog_post');


Route::get('/admin/accept/{id}','App\Http\Controllers\Admin\ApplicationController@accept')->name('admin.accept');
Route::get('/admin/reject/{id}','App\Http\Controllers\Admin\ApplicationController@reject')->name('admin.reject');
Route::get('/admin/reserve/{id}','App\Http\Controllers\Admin\ApplicationController@reserve')->name('admin.reserve');
Route::get('/admin/manage_users','App\Http\Controllers\Admin\UserController@manage')->name('admin.manage_users');
Route::post('/admin/add_admin','App\Http\Controllers\Admin\UserController@addAdmin')->name('admin.add_admin');
Route::post('revoke_admin','App\Http\Controllers\Admin\UserController@revoke')->name('admin.revoke_admin');



Route::get('/auth/google/redirect', 'App\Http\Controllers\SocialAuthGoogleController@redirect')->name('auth.google_authenticate');
Route::get('/auth/google/callback', 'App\Http\Controllers\SocialAuthGoogleController@callback');


// route to optimize images 

Route::post('/photo','PhotosController@store')->middleware('optimizeImages');
