<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\KelasController;

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

Route::get('/', function () {
    return redirect("/auth");
});

Route::get("/biodata",[BiodataController::class, "getBiodata"]);

Route::get("/auth", function(){
    return view("pages.auth");
});

Route::get("/home",function(){
    return view("pages.main");
});

Route::get("/createpost", function(){
   return view("pages.tambahBiodata");
});

Route::get("/kelas",[KelasController::class, "getAllKelas"]);

Route::get("/kelasDetail/{query}",[KelasController::class, "getKelasDetail"]);

Route::get("/biodata/{query}", [BiodataController::class, "getBiodataDetail"]);

Route::post("/simpanBiodata", [BiodataController::class, "saveBiodata"]);