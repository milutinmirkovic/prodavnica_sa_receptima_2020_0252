<?php

namespace App\Http\Controllers;

use App\Models\namirnica;
use Illuminate\Http\Request;

class NamirnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $namirnice = namirnica::all();
        return response()->json($namirnice);
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
        $namirnica = namirnica::find($id);
        if (!$namirnica) {
            return response()->json(['message' => 'Namirnica nije pronađena'], 404);
        }
        return response()->json($namirnica);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(namirnica $namirnica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, namirnica $namirnica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(namirnica $namirnica)
    {
        //
    }

    // Pronalaženje namirnice po nazivu
    public function pronadjiPoNaziv(Request $request)
    {
        $naziv = $request->naziv;
        $namirnice = namirnica::where('naziv', 'like', '%' . $naziv . '%')->get();
        if ($namirnice->isEmpty()) {
            return response()->json(['message' => 'Nema namirnica sa datim nazivom'], 404);
        }
        return response()->json($namirnice);
    }
}
