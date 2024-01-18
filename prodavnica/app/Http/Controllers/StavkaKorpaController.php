<?php

namespace App\Http\Controllers;

use App\Models\stavka_korpa;
use Illuminate\Http\Request;

class StavkaKorpaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $stavkeKorpe = stavka_korpa::all();
        return response()->json($stavkeKorpe);
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
        $request->validate([
            'korpa_id' => 'required|exists:korpa,id',
            'namirnica_id' => 'required|exists:namirnica,id',
            'kolicina' => 'required',
        ]);
 
        $stavkaKorpe = stavka_korpa::create($request->all());
        return response()->json($stavkaKorpe, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $stavkaKorpe = stavka_korpa::find($id);
        if (!$stavkaKorpe) {
            return response()->json(['message' => 'Stavka korpe nije pronađena'], 404);
        }
        return response()->json($stavkaKorpe);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stavka_korpa $stavka_korpa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $stavkaKorpe = stavka_korpa::findOrFail($id);
        $stavkaKorpe->update($request->all());
        return response()->json($stavkaKorpe, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        stavka_korpa::destroy($id);
        return response()->json(null, 204);
    }
}
