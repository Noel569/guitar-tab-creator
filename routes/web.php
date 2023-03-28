<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [LandingController::class, "landing"]);

Route::get("/editor", [EditorController::class, "editor"]);

Route::get("/login", [LoginController::class, "login"])->name("login");
