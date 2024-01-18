<?php

namespace App\Http\Controllers;

use App\Models\recept;
use Illuminate\Http\Request;
use App\Models\kategorija_recept;


class ReceptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $recepti = recept::with('stavkaRecept.namirnica')->get();
        return response()->json($recepti);
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
        $validatedData = $request->validate([
            'naziv' => 'required',
            'tekst' => 'required',
            'kategorija_recepta_id' => 'required'
        ]);
 
        $recept = recept::create($validatedData);
        return response()->json($recept, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id');
        //
        $recept = recept::with('stavkaRecept.namirnica')->find($id);
        if (!$recept) {
            return response()->json(['message' => 'Recept nije pronađen'], 404);
        }
        return response()->json($recept);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(recept $recept)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $recept = recept::findOrFail($id);
        $recept->update($request->all());
        return response()->json($recept, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(recept $recept)
    {
        //
        recept::destroy($id);
        return response()->json(null, 204);
    }

    // Prikaz svih recepta koji pripadaju određenoj kategoriji
    public function findByKategorija($kategorijaId)
    {
        $recepti = recept::where('kategorija_recepta_id', $kategorijaId)->with('stavkaRecept.namirnica')->get();
        return response()->json($recepti);
    }

    // Prikaz svih recepta koji sadrže određenu namirnicu
    public function findByNamirnica($namirnicaId)
    {
        $recepti = recept::whereHas('stavkaRecept', function ($query) use ($namirnicaId) {
            $query->where('namirnica_id', $namirnicaId);
        })->with('stavkaRecept.namirnica')->get();
 
        return response()->json($recepti);
    }

    // Dodavanje svih namirnica iz recepta u korpu
    public function dodajNamirniceUKorpu($receptId, $korpaId)
    {
        $recept = recept::with('stavkaRecept.namirnica')->find($receptId);
        if (!$recept) {
            return response()->json(['message' => 'Recept nije pronađen'], 404);
        }
 
        $korpa = korpa::find($korpaId);
        if (!$korpa) {
            return response()->json(['message' => 'Korpa nije pronađena'], 404);
        }
 
        foreach ($recept->stavkaRecept as $stavka) {
            stavka_korpa::create([
                'korpa_id' => $korpa->id,
                'namirnica_id' => $stavka->namirnica_id,
                'kolicina' => $stavka->kolicina_namirnice
            ]);
        }
 
        return response()->json(['message' => 'Namirnice su dodate u korpu']);
    }

    public function pronadjiPoNazivu(Request $request)
    {
        $naziv = $request->input('naziv');
        if(!$naziv){

            return response()->json(['message' => 'Naziv recepta nije unet'], 404);
        }
        $recept =recept::where('naziv', $naziv)->first();
        if (!$recept) {
            return response()->json(['message' => 'Recept sa datim nazivom nije pronađen'], 404);
        }
        return response()->json($recept);
    }

    


    public function namirnicePoKategoriji(Request $request)
    {
        $nazivKategorije = $request->input('naziv');

       

        if (!$nazivKategorije) {
            return response()->json(['message' => 'Nije unet naziv kategorije'], 400);
        }

      
        $kategorija = kategorija_recept::where('naziv', 'like', '%' . $nazivKategorije . '%')->first();
    
$recepti = recept::where('kategorija_recepta_id', $kategorija->id)->get();
        if ($recepti->isEmpty()) {
            return response()->json(['message' => 'Nema recepata u kategoriji ' . $nazivKategorije], 404);
        }

        return response()->json($recepti);
    }


}
