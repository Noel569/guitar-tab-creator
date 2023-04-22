<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TabController;
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

Route::get("/", [LandingController::class, "landing"])->name("landing");

Route::get("/login", [LoginController::class, "login"])->name("login");

Route::get("/profile", [ProfileController::class, "profile"])->name("profile");

Route::get("/register", [RegisterController::class, "register"])->name("register");

Route::get("/tabs/{tab_id}", [TabController::class, "tab"])->name("tab");

Route::get("/tabs/{tab_id}/edit", [TabController::class, "editor"])->name("edit");

//Route::post("/tabs/{tab_id}/save", [TabController::class, "tab"])->name("tab");

//Route::post("/tabs/{tab_id}/delete", [TabController::class, "tab"])->name("tab");