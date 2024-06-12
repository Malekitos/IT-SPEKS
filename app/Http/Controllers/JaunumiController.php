<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jaunumi;

class JaunumiController extends Controller
{

    public function show()
    {
        return Jaunumi::all();
    }

    public function store(Request $request)
    {

        $request->validate([
            'attels_ievade' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        
        $newImageName = time() . '-' . $request->name . '.' . $request->attels_ievade->extension();
        $request->attels_ievade->move(public_path('images'), $newImageName);


        $Jaunumi = new Jaunumi;

        $Jaunumi-> nosaukums = $request->nosaukums_ievade;
        $Jaunumi-> attels = $newImageName;

        $Jaunumi->save();
        return response()->json(['message' => 'Data saved successfully'], 200);

    }

    public function update(Request $request, $id)
    {
      Jaunumi::where('id',$id)-> update([
            'nosaukums' => $request->nosaukums_ievade,
        ]);
    }

    public function remove(Jaunumi $Jaunumi)
    {
        $Jaunumi->delete();
        return response()->json('Vakance deleted successfully!');
    }
}
