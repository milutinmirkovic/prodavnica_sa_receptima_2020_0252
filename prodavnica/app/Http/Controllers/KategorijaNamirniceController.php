<?php

namespace App\Http\Controllers;

use App\Models\kategorija_namirnice;
use Illuminate\Http\Request;

class KategorijaNamirniceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategorije = kategorija_namirnice::all();
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
        $kategorija = kategorija_namirnice::find($id);
        if (!$kategorija) {
            return response()->json(['message' => 'Kategorija nije pronađena'], 404);
        }
        return response()->json($kategorija);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategorija_namirnice $kategorija_namirnice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategorija_namirnice $kategorija_namirnice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategorija_namirnice $kategorija_namirnice)
    {
        //
    }

    // Pronalaženje kategorije po nazivu
    public function pronadjiPoNazivu(Request $request)
    {
        $naziv = $request->naziv;
        $kategorija = kategorija_namirnice::where('naziv', $naziv)->first();
        if (!$kategorija) {
            return response()->json(['message' => 'Kategorija sa datim nazivom nije pronađena'], 404);
        }
        return response()->json($kategorija);
    }
}

