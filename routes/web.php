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
Route::post('subscribe_to_service', 'App\Http\Controllers\ServiceSubscriptionController@subscribe')->name('subscribe');



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
Route::get('admin/user/{id}','App\Http\Controllers\Admin\UserController@adminProfile')->name('admin_user_profile');


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

// admin client management routes
Route::get('/admin/clients','App\Http\Controllers\Admin\UserController@clientManagement')->name('admin.manage_clients');
Route::get('/admin/clients/{id}','App\Http\Controllers\Admin\UserController@getClientDetails')->name('admin.client_details');

// admin gallery/event/activities management routes
Route::get('/admin/gallery','App\Http\Controllers\Admin\GalleryController@manage')->name('admin.manage_gallery');

//album management
Route::get('/admin/album/{id}/images', [App\Http\Controllers\Admin\GalleryController::class, 'getAlbum'])->name('admin.album.images');
Route::get('/admin/add_album_panel','App\Http\Controllers\Admin\GalleryController@displayAddAlbumPanel')->name('admin.album.create_panel');
Route::post('/admin/add_album','App\Http\Controllers\Admin\GalleryController@createAlbum')->name('admin.album.create');
Route::get('/admin/edit_album_panel/{id}','App\Http\Controllers\Admin\GalleryController@displayEditAlbumPanel')->name('admin.album.edit_panel');
Route::post('/admin/edit_album','App\Http\Controllers\Admin\GalleryController@editAlbum')->name('admin.album.edit');
Route::post('/admin/delete_album','App\Http\Controllers\Admin\GalleryController@deleteAlbum')->name('admin.delete_album');

//image management
Route::get('/admin/add_image_panel','App\Http\Controllers\Admin\GalleryController@displayAddImagePanel')->name('admin.image.create_panel');
Route::post('/admin/add_image','App\Http\Controllers\Admin\GalleryController@addImage')->name('admin.image.create');
Route::get('/admin/edit_image_panel/{id}','App\Http\Controllers\Admin\GalleryController@displayEditImagePanel')->name('admin.image.edit_panel');
Route::post('/admin/edit_image','App\Http\Controllers\Admin\GalleryController@editImage')->name('admin.image.edit');
Route::post('/admin/delete_image','App\Http\Controllers\Admin\GalleryController@deleteImage')->name('admin.delete_image');

Route::get('/auth/google/redirect', 'App\Http\Controllers\SocialAuthGoogleController@redirect')->name('auth.google_authenticate');
Route::get('/auth/google/callback', 'App\Http\Controllers\SocialAuthGoogleController@callback');

// staff management
Route::get('/admin/staff','App\Http\Controllers\Admin\StaffController@manage')->name('admin.manage_staff');
Route::get('/admin/add_staff_panel','App\Http\Controllers\Admin\StaffController@displayAddStaffPanel')->name('admin.staff.create_panel');
Route::post('/admin/add_staff','App\Http\Controllers\Admin\StaffController@addStaff')->name('admin.staff.create');
Route::get('/admin/edit_staff_panel/{id}','App\Http\Controllers\Admin\StaffController@displayEditStaffPanel')->name('admin.staff.edit_panel');
Route::post('/admin/edit_staff','App\Http\Controllers\Admin\StaffController@editStaff')->name('admin.staff.edit');
Route::post('/admin/delete_staff','App\Http\Controllers\Admin\StaffController@deleteStaff')->name('admin.delete_staff');

Route::get('/auth/google/redirect', 'App\Http\Controllers\SocialAuthGoogleController@redirect')->name('auth.google_authenticate');
Route::get('/auth/google/callback', 'App\Http\Controllers\SocialAuthGoogleController@callback');


// route to optimize images 

Route::post('/photo','PhotosController@store')->middleware('optimizeImages');

// tester routes
Route::get('test', function () {
    return view('test');
});

Route::post('test','App\Http\Controllers\TestController@test')->name('test');
