<?php

namespace App\Http\Controllers;

use App\Models\pieteikumi;
use App\Http\Requests\StorepieteikumiRequest;
use App\Http\Requests\UpdatepieteikumiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class PieteikumiController extends Controller
{
   

    public function show()
    {
        return pieteikumi::all();
    }

    public function store(Request $request)
    {
        // Обновите правила валидации для PDF и Word файлов
        $request->validate([
            'cv_ievade' => 'required|mimes:pdf,doc,docx|max:5048',
        ]);
    
        // Создайте новое имя файла
        $newFileName = time() . '-' . $request->name . '.' . $request->cv_ievade->extension();
        
        // Переместите файл в директорию cv_files
        $request->cv_ievade->move(public_path('cv_files'), $newFileName);
    
        // Создайте новый объект pieteikumi и сохраните данные
        $pieteikumi = new pieteikumi;
    
        $pieteikumi->vakance = $request->vakance_ievade;
        $pieteikumi->vards = $request->vards_ievade;
        $pieteikumi->uzvards = $request->uzvards_ievade;
        $pieteikumi->talrunis = $request->talrunis_ievade;
        $pieteikumi->epasts = $request->epasts_ievade;
        $pieteikumi->cv = $newFileName;
        $pieteikumi->komentars = $request->komentars_ievade;
        $pieteikumi->statuss = 'Apstrādē';
    
        $pieteikumi->save();
    
        return response()->json(['message' => 'Data saved successfully'], 200);
    }
    

 
    public function update(Request $request, $id)
    {
        

        pieteikumi::where('id',$id)-> update([
            'statuss' => $request->statuss_ievade,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove(pieteikumi $pieteikumi)
    {
        $pieteikumi->delete();
        return response()->json('Vakance deleted successfully!');
    }
}
