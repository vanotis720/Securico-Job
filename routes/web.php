<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\OfferController;
use App\Http\Controllers\Front\CandidateController;

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

Route::middleware('auth')->group(
    function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/edit', [UserController::class, 'update'])->name('user.update');

        Route::get('/candidate/edit', [CandidateController::class, 'create'])->name('candidate.create');
        Route::post('/candidate/edit', [CandidateController::class, 'store'])->name('candidate.store');


        Route::get('/offre/{id}/candidate', [OfferController::class, 'candidate'])->name('offer.candidate');
        Route::get('/offre/{id}', [OfferController::class, 'show'])->name('offer.show');
    }
);
