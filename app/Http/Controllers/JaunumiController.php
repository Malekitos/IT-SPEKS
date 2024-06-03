<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jaunumi;

class JaunumiController extends Controller
{
    public function getJaunumi()
    {
        return response()->json(Jaunumi::latest()->get());
    }

    public function storeJaunumi(Request $request)
    {
            // Validacija 
            $validated = $request->validate([
                'nosaukums' => 'required|string|max:255',
                'attels' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            // Saglaba bināra formāta
            if ($request->hasFile('attels')) {
                $image = $request->file('attels');
                $imageData = file_get_contents($image->getRealPath()); //Binaras properties of img
            } else {
                return response()->json('Kļūda ar attēlu!');
            }
    
            // New Jaunums
            Jaunumi::create([
                'nosaukums' => $validated['nosaukums'],
                'attels' => $imageData,
            ]);

        return response()->json('Jaunums stored successfully!');
    }

    public function updateJaunums(Request $request, $id)
    {
        Jaunumi::where('id', $id)->update([
            'nosaukums' => $request->nosaukums,
            'attels' => $request->attels,
        ]);

        return response()->json('Jaunums updated successfully!');
    }

    public function removeJaunums($id)
    {
        Jaunumi::where('id', $id)->delete();
        return response()->json('Jaunums removed successfully!');
    }

}
