<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ReviewController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/categoryprojects/{id}/{slug}', [HomeController::class, 'categoryprojects'])->name('categoryprojects');
Route::get('/project/{id}/{slug}', [HomeController::class, 'project'])->name('project');
Route::post('/sendreview/{id}/{slug}', [HomeController::class, 'sendreview'])->name('sendreview');
Route::post('/sendmessage', [HomeController::class, 'sendmessage'])->name('sendmessage');



Route::middleware('auth')->prefix('admin')->group(function () {

  Route::middleware('admin')->group(function () {

      Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');

      Route::get('category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin_category');
      Route::get('category/add', [\App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('admin_category_add');
      Route::post('category/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin_category_create');
      Route::post('category/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin_category_update');
      Route::get('category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin_category_edit');
      Route::get('category/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin_category_delete');
      Route::get('category/show', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin_category_show');

      Route::prefix('project')->group(function () {
          Route::get('/', [\App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('admin_projects');
          Route::get('create', [\App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('admin_project_create');
          Route::post('store', [\App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('admin_project_store');
          Route::get('edit/{id}', [\App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('admin_project_edit');
          Route::post('update/{id}', [\App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('admin_project_update');
          Route::get('delete/{id}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('admin_project_delete');
          Route::get('show', [\App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('admin_project_show');

      });


      Route::prefix('image')->group(function () {

          Route::get('create/{project_id}', [\App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin_image_add');
          Route::post('store/{project_id}', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_image_store');
          Route::get('delete/{id}/{project_id}', [\App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_image_delete');
          Route::get('show', [\App\Http\Controllers\Admin\ImageController::class, 'show'])->name('admin_image_show');

      });
      Route::prefix('messages')->group(function () {
          Route::get('/', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin_message');
          Route::get('edit/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('admin_message_edit');
          Route::post('update/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'update'])->name('admin_message_update');
          Route::get('delete/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('admin_message_delete');
          Route::get('show', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin_message_show');

      });
      Route::prefix('review')->group(function () {

          Route::get('/', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin_review');
          Route::post('update/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'update'])->name('admin_review_update');
          Route::get('delete/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('admin_review_delete');
          Route::get('show/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'show'])->name('admin_review_show');

      });

      Route::prefix('faq')->group(function () {
          Route::get('/', [FaqController::class, 'index'])->name('admin_faq');
          Route::get('create', [FaqController::class, 'create'])->name('admin_faq_add');
          Route::post('store', [FaqController::class, 'store'])->name('admin_faq_store');
          Route::get('edit/{id}', [FaqController::class, 'edit'])->name('admin_faq_edit');
          Route::post('update/{id}', [FaqController::class, 'update'])->name('admin_faq_update');
          Route::get('delete/{id}', [FaqController::class, 'destroy'])->name('admin_faq_delete');
          Route::get('show', [FaqController::class, 'show'])->name('admin_faq_show');

      });
        #Settings
      Route::get('setting', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_setting');
      Route::post('setting/update', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin_setting_update');

      Route::prefix('user')->group(function () {
          Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin_users');
          Route::post('create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin_user_add');
          Route::post('store', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin_user_store');
          Route::get('edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin_user_edit');
          Route::post('update/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin_user_update');
          Route::get('delete/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin_user_delete');
          Route::get('show/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin_user_show');
          Route::get('userrole/{id}', [\App\Http\Controllers\Admin\UserController::class, 'user_roles'])->name('admin_user_roles');
          Route::post('userrolestore/{id}', [\App\Http\Controllers\Admin\UserController::class, 'user_role_store'])->name('admin_user_role_add');
          Route::get('userroledelete/{userid}/{roleid}', [\App\Http\Controllers\Admin\UserController::class, 'user_role_delete'])->name('admin_user_role_delete');

      });

  });
});


Route::middleware('auth')->prefix('user')->namespace('user')->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('userprofile');

    Route::prefix('review')->group(function () {

        Route::get('/', [\App\Http\Controllers\ReviewController::class, 'index'])->name('user_review');
        Route::post('update/{id}', [\App\Http\Controllers\ReviewController::class, 'update'])->name('user_review_update');
        Route::get('delete/{id}', [\App\Http\Controllers\ReviewController::class, 'destroy'])->name('user_review_delete');
        Route::get('show/{id}', [\App\Http\Controllers\ReviewController::class, 'show'])->name('user_review_show');

    });


});

Route::get('/admin/login',[HomeController::class,'login'])->name('admin_login');
Route::post('/admin/logincheck',[HomeController::class,'logincheck'])->name('admin_logincheck');
Route::get('/admin/logout',[HomeController::class,'logout'])->name('admin_logout');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');



