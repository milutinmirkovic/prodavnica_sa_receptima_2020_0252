<?php

namespace App\Http\Controllers;

use App\Models\korisnik;
use Illuminate\Http\Request;

class KorisnikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $korisnici = korisnik::all();
        return response()->json($korisnici);
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
    public function show(Request $request)
    {
        $id = $request->input('id');
        $korisnik = korisnik::find($id);
        if (!$korisnik) {
            return response()->json(['message' => 'Korisnik nije pronađen'], 404);
        }
        return response()->json($korisnik);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(korisnik $korisnik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, korisnik $korisnik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(korisnik $korisnik)
    {
        //
    }


    

}
