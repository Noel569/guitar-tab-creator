<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TabController;
use App\Http\Controllers\EditorController;
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

Route::get("/", [LandingController::class, "view"])->name("landing");

Route::get("/login", [LoginController::class, "view"])->name("login");

Route::post("/login", [LoginController::class, "login"])->name("login.login");

Route::post("/logout", [LoginController::class, "logout"])->name("logout");

Route::get("/profile", [ProfileController::class, "profile"])->name("profile");

Route::get("/register", [RegisterController::class, "view"])->name("register");

Route::post("/register", [RegisterController::class, "store"])->name("register.store");

Route::get("/tabs/{tab_id}", [TabController::class, "tab"])->name("tab");

Route::middleware("middleware.auth")->group(function () {
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");

    Route::get("/profile", [ProfileController::class, "profile"])->name("profile");

    Route::get("/tabs/{tab_id}/edit", [TabController::class, "editor"])->name("edit");

    Route::post("/tabs/{tab_id}/edit", [TabController::class, "update"])->name("edit.update");

    Route::post("/tabs/{tab_id}/like", [TabController::class, "like"])->name("like");

    Route::post("/tabs/{tab_id}/comment", [TabController::class, "comment"])->name("comment");

    Route::post("/tabs/{tab_id}/delete", [TabController::class, "delete"])->name("delete");

    Route::get("/editor", [EditorController::class, "view"])->name("editor");

    Route::post("/editor", [EditorController::class, "store"])->name("editor.store");
});