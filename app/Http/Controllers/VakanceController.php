<?php

namespace App\Http\Controllers;

use App\Models\vakance;
use Illuminate\Http\Request;

class VakanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(Request $request)
    {
        $query = Vakance::query();

        if ($request->filled('workType')) {
            $query->where('darba_veids', $request->workType);
        }

        if ($request->filled('keyword')) {
            $query->where('nosaukums', 'like', '%' . $request->keyword . '%')
                  ->orWhere('iss_apraksts', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('workgraph')) {
            $query->where('darba_laiks', $request->workgraph);
        }

        if ($request->filled('language')) {
            $query->where('valodas_veids', $request->language);
        }

        if ($request->filled('salary')) {
            $query->where('alga', '>=', $request->salary);
        }

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
        $vakance-> darba_laiks = $request->darba_laiks_ievade;
        $vakance-> darba_veids = $request->darba_veids_ievade;
        $vakance-> valodas_veids = $request->valodas_veids_ievade;


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
    public function update(Request $request, $id)
    {
        

        vakance::where('id',$id)-> update([
            'nosaukums' => $request->nosaukums_ievade,
            'iss_apraksts' => $request->iss_apraksts_ievade,
            'alga' => $request->alga_ievade,
            'atrasanas_vieta' => $request->atrasanas_vieta_ievade,
            // 'attels' => $newImageName,
            'darba_apraksts' => $request->darba_apraksts_ievade,
            'darba_laiks' => $request->darba_laiks_ievade,
            'darba_veids' => $request->darba_veids_ievade,
            'valodas_veids' => $request->valodas_veids_ievade
        ]);
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
