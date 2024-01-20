<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\NamirnicaController;
use App\Http\Controllers\KategorijaNamirniceController;
use App\Http\Controllers\KategorijaReceptController;
use App\Http\Controllers\KorpaController;
use App\Http\Controllers\StavkaKorpaController;
use App\Http\Controllers\ReceptController;
use App\Http\Controllers\API\AuthController;

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


//KATEGORIJA NAMIRNICE

Route::resource('/kategorijeNamirnica', KategorijaNamirniceController::class);
Route::get('/kategorijaNamirnice/pronadjiPoNazivu',[KategorijaNamirniceController::class,'pronadjiPoNazivu']);


//NAMIRNICA



Route::post('/namirnice/dodaj', [NamirnicaController::class, 'store']); //radi
Route::delete('/namirnice/obrisi/{id}', [NamirnicaController::class, 'destroy']); //radi
Route::get('/namirnice', [NamirnicaController::class, 'index']); //raadi
Route::get('/namirnice/nadjiID', [NamirnicaController::class, 'show']); //radi
Route::get('/namirnice/naziv', [NamirnicaController::class, 'pronadjiPoNaziv']);//radi
Route::get('/namirnice/kategorija', [NamirnicaController::class, 'namirnicePoKategoriji']);//radi
Route::put('/namirnice/izmeni/{id}', [NamirnicaController::class, 'update']); //radi








//KORISNIK

Route::get('/korisnici', [KorisnikController::class, 'index']);
Route::get('/korisnici/id', [KorisnikController::class, 'show']);



Route::get('/recept/id',[ReceptController::class,'show']);
Route::get('/recept/naziv', [ReceptController::class, 'pronadjiPoNazivu']);
Route::get('/recept/kategorija', [ReceptController::class, 'namirnicePoKategoriji']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//KATEGORIJA RECEPT
Route::get('/kategorijaRecept', [KategorijaReceptController::class, 'index']);

Route::get('/kategorijaRecept/id', [KategorijaReceptController::class, 'show']);

Route::get('/kategorijaRecept/naziv', [KategorijaReceptController::class, 'pronadjiPoNazivuKat']);

Route::get('/kategorijaRecept/namirnica', [KategorijaReceptController::class, 'pronadjiPoNamirnici']);

//KORPA
Route::get('/korpa', [KorpaController::class, 'index']);

Route::get('/korpa/id', [KorpaController::class, 'show']);

Route::get('/korpa/cena', [KorpaController::class, 'ukupnaCena']);

//STAVKA KORPA
Route::get('/stavkaKorpa', [StavkaKorpaController::class, 'index']);

Route::get('/stavkaKorpa/id', [StavkaKorpaController::class, 'show']);

Route::get('/stavkaKorpa/store', [StavkaKorpaController::class, 'store']);

Route::get('/stavkaKorpa/update', [StavkaKorpaController::class, 'update']);

Route::get('/stavkaKorpa/destroy', [StavkaKorpaController::class, 'destroy']);

//REGISTRACIJA
Route::post('/registracija', [AuthController::class, 'registracija']);

//LOGIN
Route::post('/login', [AuthController::class, 'login']);

//LOGOUT
//Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


//EXPORT 
Route::get('/recepti/pdf', [ReceptController::class, 'exportToPdf']);

