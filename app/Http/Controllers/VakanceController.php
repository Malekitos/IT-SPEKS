<?php

namespace App\Http\Controllers;

use App\Models\vakance;
use Illuminate\Http\Request;

class VakanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return Vakance::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vakance = Vakance::create($request->all());
        return response()->json($vakance, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'attels_ievade' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        
        $newImageName = time() . '-' . $request->name . '.' . $request->attels_ievade->extension();
        $request->attels_ievade->move(public_path('images'), $newImageName);


        $vakance = new vakance;

        $vakance-> nosaukums = $request->nosaukums_ievade;
        $vakance-> iss_apraksts = $request->iss_apraksts_ievade;
        $vakance-> alga = $request->alga_ievade;
        $vakance-> atrasanas_vieta = $request->atrasanas_vieta_ievade;
        $vakance-> attels = $newImageName;
        $vakance-> darba_apraksts = $request->darba_apraksts_ievade;

        $vakance->save();

        return response()->json(['message' => 'Data saved successfully'], 200);

    }

    /**
     * Display the specified resource.
     */
    // public function show(vakance $vakance)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function redigesana(Request $request, vakance $vakance)
    {
        $vakance = vakance::findOrFail($id);
        $vakance->update($request->all());
        return response()->json($vakance, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove(vakance $vakance)
    {
        $vakance->delete();
        return response()->json('Vakance deleted successfully!');
    }
}
