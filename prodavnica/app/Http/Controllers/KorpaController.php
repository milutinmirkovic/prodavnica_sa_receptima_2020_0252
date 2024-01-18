<?php

namespace App\Http\Controllers;

use App\Models\korpa;
use Illuminate\Http\Request;

class KorpaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $korpe = korpa::with('stavkaKorpa.namirnica')->get();
        return response()->json($korpe);
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
        $korpa = korpa::with('stavkaKorpa.namirnica')->find($id);
        if (!$korpa) {
            return response()->json(['message' => 'Korpa nije pronađena'], 404);
        }
        return response()->json($korpa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(korpa $korpa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, korpa $korpa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(korpa $korpa)
    {
        //
    }

    // Ažuriranje ukupne cene korpe
    public function ukupnaCena($id)
    {
        $korpa = korpa::with('stavkaKorpa.namirnica')->find($id);
        if (!$korpa) {
            return response()->json(['message' => 'Korpa nije pronađena'], 404);
        }
 
        $ukupnaCena = $korpa->stavkaKorpa->sum(function ($stavka) {
            return $stavka->namirnica->cena * $stavka->kolicina;
        });
 
        $korpa->ukupna_cena = $ukupnaCena;
        $korpa->save();
 
        return response()->json($korpa);
    }
}
