<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OfferController as AdminOfferController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\OfferController;
use App\Http\Controllers\Front\CandidateController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\RecruiterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.post');

Route::get('/submit', [HomeController::class, 'submitCv'])->name('submitCv');

Route::get('categorie/{id}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/offre/{id}', [OfferController::class, 'show'])->name('offer.show');


Route::middleware('auth')->group(
    function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/edit', [UserController::class, 'update'])->name('user.update');

        Route::get('/candidate/edit', [CandidateController::class, 'create'])->name('candidate.create');
        Route::post('/candidate/edit', [CandidateController::class, 'store'])->name('candidate.store');

        Route::get('/enterprise/edit', [RecruiterController::class, 'create'])->name('recruiter.create');
        Route::post('/enterprise/edit', [RecruiterController::class, 'store'])->name('recruiter.store');

        Route::get('/offre/{id}/candidate', [OfferController::class, 'candidate'])->name('offer.candidate');

        // admin action
        Route::get('/dashboard', [DashboardController::class, 'home'])->name('admin.home');
        Route::get('/dashboard/users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::get('/dashboard/users/{id}/delete', [AdminUserController::class, 'destroy'])->name('admin.users.delete');

        Route::get('/dashboard/offers', [AdminOfferController::class, 'index'])->name('admin.offers');
        Route::get('/dashboard/offers/{id}/check', [AdminOfferController::class, 'check'])->name('admin.offers.check');
        Route::get('/dashboard/offers/{id}/delete', [AdminOfferController::class, 'destroy'])->name('admin.offers.delete');
        Route::get('/dashboard/offers/{id}', [AdminOfferController::class, 'show'])->name('admin.offers.show');
    }
);
