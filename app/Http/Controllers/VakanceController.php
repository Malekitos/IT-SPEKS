<?php

namespace App\Http\Controllers;

use App\Models\vakance;
use Illuminate\Http\Request;

class VakanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(vakance $vakance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vakance $vakance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vakance $vakance)
    {
        $vakance = vakance::findOrFail($id);
        $vakance->update($request->all());
        return response()->json($vakance, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vakance $vakance)
    {
        vakance::destroy($id);
        return response()->json(null, 204);
    }
}
