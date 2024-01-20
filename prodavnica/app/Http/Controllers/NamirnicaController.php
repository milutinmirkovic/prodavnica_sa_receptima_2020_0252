<?php

namespace App\Http\Controllers;

use App\Models\namirnica;
use Illuminate\Http\Request;
use App\Models\kategorija_namirnice;


class NamirnicaController extends Controller
{


    
    public function index()
    {
        //
        $namirnice = namirnica::all();
        return response()->json($namirnice);
    }

  
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show(Request $request)
    {
        $id = $request->id;
        $namirnica = namirnica::find($id);
        if (!$namirnica) {
            return response()->json(['message' => 'Namirnica nije pronađena'], 404);
        }
        return response()->json($namirnica);
    }   

  
    public function edit(namirnica $namirnica)
    {
        //
    }

   
    public function update(Request $request, namirnica $namirnica)
    {
        //
    }

    
    public function destroy(namirnica $namirnica)
    {
        //
    }

    
    public function pronadjiPoNaziv(Request $request)
    {
        $naziv = $request->naziv;
        $namirnice = namirnica::where('naziv', 'like', '%' . $naziv . '%')->get();
        if ($namirnice->isEmpty()) {
            return response()->json(['message' => 'Nema namirnica sa datim nazivom'], 404);
        }
        return response()->json($namirnice);
    }

    public function namirnicePoKategoriji(Request $request)
    {
        $nazivKategorije = $request->input('naziv_kategorije');

       

        if (!$nazivKategorije) {
            return response()->json(['message' => 'Nije unet naziv kategorije'], 400);
        }

      /*  $kategorija = kategorija_namirnice::whereHas('kategorijaNamirnica', function($query) use ($nazivKategorije){
            $query->where('naziv', 'like', '%' . $nazivKategorije . '%');
        })->get();
        */
        $kategorija = kategorija_namirnice::where('naziv', 'like', '%' . $nazivKategorije . '%')->first();
        $idKat = $kategorija->id;

       /* $namirnice = namirnica::whereHas('kategorija_namirnica_id', function ($query) use ($idKat) {
            $query->where('kategorija_namirnica_id', 'like', '%' . $idKat . '%');
        })->get();
*/
        $namirnice = namirnica::where('kategorija_namirnica_id', $kategorija->id)->get();
        if ($namirnice->isEmpty()) {
            return response()->json(['message' => 'Nema namirnica u kategoriji ' . $nazivKategorije], 404);
        }

        return response()->json($namirnice);
    }
}
