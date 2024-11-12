<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\AutherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', function () {
    return view('welcome');
})->middleware('guest');
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/Change-password', [LoginController::class, 'changePassword'])->name('change_password');


Route::middleware('auth')->group(function () {
    Route::get('change-password',[dashboardController::class,'change_password_view'])->name('change_password_view');
    Route::post('change-password',[dashboardController::class,'change_password'])->name('change_password');
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    // author CRUD
    Route::get('/authors', [AutherController::class, 'index'])->name('authors')->middleware('role');
    Route::get('/authors/create', [AutherController::class, 'create'])->name('authors.create');
    Route::get('/authors/edit/{auther}', [AutherController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/update/{id}', [AutherController::class, 'update'])->name('authors.update');
    Route::post('/authors/delete/{id}', [AutherController::class, 'destroy'])->name('authors.destroy');
    Route::post('/authors/create', [AutherController::class, 'store'])->name('authors.store');  

    // Category CRUD
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories')->middleware('role') ;
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

    // books CRUD
    Route::get('/books', [BookController::class, 'index'])->name('books')->middleware('role');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create')->middleware('role');
    Route::get('/book/details/{id}', [BookController::class, 'details'])->name('book.details');
    Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit')->middleware('role');
    Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update')->middleware('role');
    Route::post('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy')->middleware('role');
    Route::post('/book/create', [BookController::class, 'store'])->name('book.store')->middleware('role');

    // students CRUD
    Route::get('/students', [StudentController::class, 'index'])->name('students')->middleware('role');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create')->middleware('role');
    Route::get('/student/edit/{student}', [StudentController::class, 'edit'])->name('student.edit')->middleware('role');
    Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update')->middleware('role');
    Route::post('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy')->middleware('role');
    Route::post('/student/create', [StudentController::class, 'store'])->name('student.store')->middleware('role');
    Route::get('/student/show/{id}', [StudentController::class, 'show'])->name('student.show')->middleware('role');

    // admin CRUD
    Route::get('/admins', [AdminController::class, 'index'])->name('admins')->middleware('role');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/edit/{student}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/show/{id}', [AdminController::class, 'show'])->name('admin.show');
    
    //settings CRUD
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings')->middleware('role');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings');

    Route::post('/search', [SearchController::class, 'search']);
});
