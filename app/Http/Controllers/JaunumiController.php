<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jaunumi;

class JaunumiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Jaunumi::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createJaunums()
    {
        $jaunums = Jaunumi::create($request->all());
        return response()->json($jaunums, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeJaunums(Request $request)
    {

        $request->validate([
            'nosaukums' => 'required',
            'attels_ievade' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        
        $newImageName = time() . '-' . $request->name . '.' . $request->attels_ievade->extension();
        $request->attels_ievade->move(public_path('images'), $newImageName);


        $jaunums = new Jaunumi;

        $jaunums-> nosaukums = $request->nosaukums_ievade;
        $jaunums-> attels = $newImageName;
        

        $jaunums->save();

        return response()->json(['message' => 'Data saved successfully'], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Jaunumi $jaunums)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jaunumi $jaunums)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jaunumi $jaunums)
    {
        $jaunums = Jaunumi::findOrFail($id);
        $jaunums->update($request->all());
        return response()->json($jaunums, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jaunumi $jaunums)
    {
        Jaunumi::destroy($id);
        return response()->json(null, 204);
    }
}
