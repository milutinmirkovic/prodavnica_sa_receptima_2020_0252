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

Route::get('/korisnici', [KorisnikController::class, 'index']);
Route::get('/namrinica/id', [KorisnikController::class, 'show']);
Route::get('/namirnica/naziv', [NamirnicaController::class, 'pronadjiPoNaziv']);




//RECEPT
Route::get('/recept',[ReceptController::class,'index']);//radi
Route::get('/recept/prikazi',[ReceptController::class,'show']);//radi
Route::get('/recept/kategorija', [ReceptController::class, 'receptiPoKategoriji']);//radi
Route::post('/recept/sacuvaj', [ReceptController::class, 'store']);//radi
Route::get('/recept/naziv', [ReceptController::class, 'pronadjiPoNazivu']);//radi
Route::put('/recept/izmeni/{id}', [ReceptController::class, 'update']);//radi
Route::delete('/recept/obrisi/{id}', [ReceptController::class, 'destroy']);//radi
Route::get('/recept/namirnica', [ReceptController::class, 'pronadjiPoNamirnici']);//radi
Route::get('/recept/dodaj', [ReceptController::class, 'dodajNamirniceUKorpu']);//radi

//AUTH
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//KATEGORIJA RECEPT
Route::get('/kategorijaRecept', [KategorijaReceptController::class, 'index']);//radi

Route::get('/kategorijaRecept/pronadji', [KategorijaReceptController::class, 'show']);//radi

Route::post('/kategorijaRecept/sacuvaj', [KategorijaReceptController::class, 'store']);//radi

Route::put('/kategorijaRecept/izmeni/{id}', [KategorijaReceptController::class, 'update']);//radi

Route::delete('/kategorijaRecept/obrisi/{id}', [KategorijaReceptController::class, 'destroy']);//radi

Route::get('/kategorijaRecept/naziv', [KategorijaReceptController::class, 'pronadjiPoNazivuKat']);//radi

Route::get('/kategorijaRecept/namirnica', [KategorijaReceptController::class, 'pronadjiPoNamirnici']);//radi

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

