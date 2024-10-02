<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoundController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReplieController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\StudentController;

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


Auth::routes();
Route::get('adminLogins', function () {
    return view('auth.login');
})->name("adminLogins");

Route::get("/", [QuizzController::class, "root"])->name("root");
Route::post("/loginUser", [QuizzController::class, "loginUser"])->name("loginUser");

Route::middleware("quizz")->group(function(){
Route::get("homeQuizz", [QuizzController::class, "homeQuizz"])->name("homeQuizz");
Route::get("checkQuizz/{id_question}/{currentPage}/{allPages}", [QuizzController::class, "checkQuizz"])->name("checkQuizz");
Route::get("sucssesQuizz", [QuizzController::class, "sucssesQuizz"])->name("sucssesQuizz");
Route::get("logoutQuizz/{id}", [QuizzController::class, "logoutQuizz"])->name("logoutQuizz");
Route::get("errorQuizz/{currentPage}/{allPage}", [QuizzController::class, "errorQuizz"])->name("errorQuizz");

});

Route::middleware("auth")->group(function () {
    Route::prefix("user")->name("user.")->group(function () {
        Route::get("index", [UserController::class, "index"])->name("index");
        Route::get("create", [UserController::class, "create"])->name("create");
        Route::post("updateProfile/{id}", [UserController::class, "updateProfile"])->name("updateProfile");
        Route::get("profile/{id}", [UserController::class, "profile"])->name("profile");
    });

    Route::prefix("quizz")->name("quizz.")->group(function () {
        Route::get("index", [QuizzController::class, "index"])->name("index");
        Route::get("create", [QuizzController::class, "create"])->name("create");
        Route::post("store", [QuizzController::class, "store"])->name("store");
        Route::get("show/{id}", [QuizzController::class, "show"])->name("show");
        Route::get("edit/{id}", [QuizzController::class, "edit"])->name("edit");
        Route::post("update/{id}", [QuizzController::class, "update"])->name("update");
        Route::get("destroy/{id}", [QuizzController::class, "destroy"])->name("destroy");
    });
});
