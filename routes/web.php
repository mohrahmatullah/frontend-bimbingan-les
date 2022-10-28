<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\JadwalBelajarController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\TransactionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index'])->name('get-auth');
Route::post('/', [AuthController::class, 'auth'])->name('post-auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [AuthController::class, 'sendLinkForgotPassword'])->name('send-link-forgot-password');
Route::get('forgot-password/{id}', [AuthController::class, 'redirectForgotPassword'])->name('redirect-forgot-password');
Route::post('forgot-password/{id}', [AuthController::class, 'saveForgotPassword'])->name('save-forgot-password');

Route::get('sign-up', [AuthController::class, 'register'])->name('get-register');
Route::post('sign-up', [AuthController::class, 'saveRegister'])->name('post-register');

Route::get('error-404', [AuthController::class, 'error404'])->name('error-404');

Route::get('biodata', [BiodataController::class, 'index'])->name('biodata');
Route::get('create-biodata', [BiodataController::class, 'create'])->name('create-biodata');
Route::post('create-biodata', [BiodataController::class, 'store'])->name('save-biodata');
Route::get('edit-biodata/{id}', [BiodataController::class, 'edit'])->name('edit-biodata');
Route::post('edit-biodata/{id}', [BiodataController::class, 'update'])->name('update-biodata');
Route::get('delete-biodata/{id}', [BiodataController::class, 'delete'])->name('delete-biodata');

Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
Route::get('create-kelas', [KelasController::class, 'create'])->name('create-kelas');
Route::post('create-kelas', [KelasController::class, 'store'])->name('save-kelas');
Route::get('edit-kelas/{id}', [KelasController::class, 'edit'])->name('edit-kelas');
Route::post('edit-kelas/{id}', [KelasController::class, 'update'])->name('update-kelas');
Route::get('delete-kelas/{id}', [KelasController::class, 'delete'])->name('delete-kelas');

Route::get('biodata', [BiodataController::class, 'index'])->name('biodata');

Route::get('transactions', [TransactionController::class, 'index'])->name('transactions');
Route::post('transactions', [TransactionController::class, 'store'])->name('save-transactions');

Route::get('post', [PostController::class, 'index'])->name('post');
Route::get('create-post', [PostController::class, 'create'])->name('create-post');
Route::post('create-post', [PostController::class, 'store'])->name('save-post');
Route::get('edit-post/{id}', [PostController::class, 'edit'])->name('edit-post');
Route::post('edit-post/{id}', [PostController::class, 'update'])->name('edit-post');
Route::get('delete-post/{id}', [PostController::class, 'delete'])->name('delete-post');

Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('create-category', [CategoryController::class, 'create'])->name('create-category');
Route::post('create-category', [CategoryController::class, 'store'])->name('save-category');
Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
Route::post('edit-category/{id}', [CategoryController::class, 'update'])->name('edit-category');
Route::get('delete-category/{id}', [CategoryController::class, 'delete'])->name('delete-category');

Route::get('tag', [TagController::class, 'index'])->name('tag');
Route::get('create-tag', [TagController::class, 'create'])->name('create-tag');
Route::post('create-tag', [TagController::class, 'store'])->name('save-tag');
Route::get('edit-tag/{id}', [TagController::class, 'edit'])->name('edit-tag');
Route::post('edit-tag/{id}', [TagController::class, 'update'])->name('edit-tag');
Route::get('delete-tag/{id}', [TagController::class, 'delete'])->name('delete-tag');

Route::get('profile', [AuthController::class, 'profile'])->name('profile');
Route::get('list-user', [TagController::class, 'listUser'])->name('list-user');


// Route::get('/', [HomeController::class, 'post'])->name('/');
// Route::get('/{id}', [HomeController::class, 'post'])->name('post-category');
// Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('post-detail');