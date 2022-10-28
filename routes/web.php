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

Route::get('list-transactions', [TransactionController::class, 'index'])->name('list-transactions');
Route::get('transactions', [TransactionController::class, 'show'])->name('transactions');
Route::post('transactions', [TransactionController::class, 'store'])->name('save-transactions');

Route::get('list-transactions-by-id', [TransactionController::class, 'index'])->name('list-transactions-by-id');

Route::get('approve-transactions/{id}', [TransactionController::class, 'approveTransaction'])->name('approve-transactions');
Route::get('cancel-transactions/{id}', [TransactionController::class, 'cancelTransaction'])->name('cancel-transactions');

Route::get('jadwal-belajar', [JadwalBelajarController::class, 'index'])->name('jadwal-belajar');
Route::get('create-jadwal-belajar', [JadwalBelajarController::class, 'create'])->name('create-jadwal-belajar');
Route::post('create-jadwal-belajar', [JadwalBelajarController::class, 'store'])->name('save-jadwal-belajar');
Route::get('edit-jadwal-belajar/{id}', [JadwalBelajarController::class, 'edit'])->name('edit-jadwal-belajar');
Route::post('edit-jadwal-belajar/{id}', [JadwalBelajarController::class, 'update'])->name('edit-jadwal-belajar');
Route::get('delete-jadwal-belajar/{id}', [JadwalBelajarController::class, 'delete'])->name('delete-jadwal-belajar');

Route::get('jurusan', [JurusanController::class, 'index'])->name('jurusan');
Route::get('create-jurusan', [JurusanController::class, 'create'])->name('create-jurusan');
Route::post('create-jurusan', [JurusanController::class, 'store'])->name('save-jurusan');
Route::get('edit-jurusan/{id}', [JurusanController::class, 'edit'])->name('edit-jurusan');
Route::post('edit-jurusan/{id}', [JurusanController::class, 'update'])->name('edit-jurusan');
Route::get('delete-jurusan/{id}', [JurusanController::class, 'delete'])->name('delete-jurusan');

Route::get('profile', [AuthController::class, 'profile'])->name('profile');
Route::get('list-user', [TagController::class, 'listUser'])->name('list-user');


// Route::get('/', [HomeController::class, 'post'])->name('/');
// Route::get('/{id}', [HomeController::class, 'post'])->name('post-category');
// Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('post-detail');