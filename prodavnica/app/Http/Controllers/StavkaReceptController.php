<?php

namespace App\Http\Controllers;

use App\Models\stavka_recept;
use Illuminate\Http\Request;

class StavkaReceptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $stavkeRecepta = stavka_recept::all();
        return response()->json($stavkeRecepta);
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
            'recept_id' => 'required|exists:recept,id',
            'namirnica_id' => 'required|exists:namirnica,id',
            'kolicina_namirnice' => 'required',
        ]);
 
        $stavkaRecepta = stavka_recept::create($request->all());
        return response()->json($stavkaRecepta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $stavkaRecepta = stavka_recept::find($id);
        if (!$stavkaRecepta) {
            return response()->json(['message' => 'Stavka recepta nije pronađena'], 404);
        }
        return response()->json($stavkaRecepta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stavka_recept $stavka_recept)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $stavkaRecepta = stavka_recept::findOrFail($id);
        $stavkaRecepta->update($request->all());
        return response()->json($stavkaRecepta, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        stavka_recept::destroy($id);
        return response()->json(null, 204);
    }
}
