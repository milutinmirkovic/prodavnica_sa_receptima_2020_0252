<?php

namespace App\Http\Controllers;

use App\Models\kategorija_recept;
use Illuminate\Http\Request;

class KategorijaReceptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategorije = kategorija_recept::all();
        return response()->json($kategorije);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $kategorija = kategorija_recept::find($id);
        if (!$kategorija) {
            return response()->json(['message' => 'Kategorija recepta nije pronađena'], 404);
        }
        return response()->json($kategorija);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategorija_recept $kategorija_recept)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategorija_recept $kategorija_recept)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategorija_recept $kategorija_recept)
    {
        //
    }

    // Pronalaženje kategorije recepta po nazivu
    public function pronadjiPoNazivuKat(Request $request)
    {
        $naziv = $request->naziv;
        $kategorija = kategorija_recept::where('naziv', $naziv)->first();
        if (!$kategorija) {
            return response()->json(['message' => 'Kategorija recepta sa datim nazivom nije pronađena'], 404);
        }
        return response()->json($kategorija);
    }

    // Prikaz svih recepata koji sadrže određenu namirnicu
    public function pronadjiPoNamirnici($namirnicaId)
    {
        $recepti = recept::whereHas('stavkaRecept', function ($query) use ($namirnicaId) {
            $query->where('namirnica_id', $namirnicaId);
        })->get();
 
        return response()->json($recepti);
    }
}
