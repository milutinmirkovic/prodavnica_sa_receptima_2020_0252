<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\NamirnicaController;
use App\Http\Controllers\KategorijaNamirniceController;
use App\Http\Controllers\ReceptController;
use App\Http\Controllers\KategorijaReceptController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/korisnici', [KorisnikController::class, 'index']);
Route::get('/korisnici/id', [KorisnikController::class, 'show']);

// Get all namirnice
Route::get('/namirnice', [NamirnicaController::class, 'index']);

// Store a new namirnica
Route::post('/namirnice', [NamirnicaController::class, 'store']);

// Get a specific namirnica by id
Route::get('/namirnice/id', [NamirnicaController::class, 'show']);

// Update a specific namirnica
Route::put('/namirnice/{namirnica}', [NamirnicaController::class, 'update']);

// Delete a specific namirnica
Route::delete('/namirnice/{namirnica}', [NamirnicaController::class, 'destroy']);

// Find namirnica by name
Route::get('/namirnice/pronadji', [NamirnicaController::class, 'pronadjiPoNaziv']);
Route::get('/namirnice/kategorija', [NamirnicaController::class, 'namirnicePoKategoriji']);


Route::get('/kategorijaNamirnice/pronadjiPoNazivu',[KategorijaNamirniceController::class,'pronadjiPoNazivu']);
Route::get('/kategorijaNamirnice/pronadjiPoIDu',[KategorijaNamirniceController::class,'show']);

Route::get('/recept/id',[ReceptController::class,'show']);
Route::get('/recept/naziv', [ReceptController::class, 'pronadjiPoNazivu']);
Route::get('/recept/kategorija', [ReceptController::class, 'namirnicePoKategoriji']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
