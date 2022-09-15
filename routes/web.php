<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Models\Biodata;

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
Route::redirect("/", "/login", 301);

Route::get("/logout",function(){
    Auth::logout();
    return redirect("/login");
});

Route::middleware(["guest"])->group(function(){

    Route::get("/login",[LoginController::class,"index"])->name("login");
    Route::post("/loginCheck",[LoginController::class,"authenticate"]);

    Route::prefix("/register")->group(function(){
        Route::get("/",[RegController::class, "createIndex"]);
        Route::post("/add",[RegController::class, "add"]);
    });

});

Route::middleware(["auth"])->group(function(){

    Route::prefix("/register")->group(function(){
        Route::get("/data",[RegController::class, "index"]);
        Route::get("/datatables",[RegController::class, "datatables"]);
        Route::get("/edit/{query}",[RegController::class, "editIndex"]);
        Route::put("/update/{query}", [RegController::class, "update"]);
        Route::post("/delete", [RegController::class, "delete"]);
    });

    Route::prefix("/biodata")->group(function(){
        Route::get("/", [BiodataController::class, "index"])->name("home");
        Route::get("/datatables", [BiodataController::class, "datatables"]);
        Route::get("/create", [BiodataController::class, 'addIndex']);
        Route::get("/edit/{query}", [BiodataController::class, 'editIndex']);
        Route::post("/store", [BiodataController::class, "store"]);
        Route::post("/delete",[BiodataController::class, 'delete']);
        Route::post('/update/{id}', [BiodataController::class, 'update']);
    });

    Route::prefix("/kelas")->group(function(){
        Route::get("/", [KelasController::class, "index"]);
        Route::get("/datatables", [KelasController::class, "datatables"]);
        Route::get("/create", [KelasController::class, 'addIndex']);
        Route::get("/edit/{query}", [KelasController::class, 'editIndex']);
        Route::post("/store", [KelasController::class, "store"]);
        Route::post("/delete",[KelasController::class, 'delete']);
        Route::post('/update/{id}', [KelasController::class, 'update']);
    });

    Route::get('/profile', [ProfileController::class, 'index']);
        
});



