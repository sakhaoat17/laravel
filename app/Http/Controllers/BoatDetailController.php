<?php

namespace App\Http\Controllers;
use App\Models\BoatDetail;
use Illuminate\Http\Request;

class BoatDetailController extends Controller
{
   
    public function show($boat_id)
    {
        $boatDetail = BoatDetail::where('boat_id', $boat_id)->first();
        
        if (!$boatDetail) {
            return response()->json(['error' => 'Boat detail not found'], 404);
        }
        
        return response()->json($boatDetail);
}
public function store(Request $request)
    {
        $validatedData = $request->validate([
            'boat_id' => 'required|numeric',
            'title' => 'required|string',
            'location' => 'required|string',
            'body_of_water' => 'required|string',
            'captained' => 'required|boolean',
            'make' => 'required|string',
            'model' => 'required|string',
            'image1' => 'required|string',
            'image2' => 'required|string',
            'year' => 'required|numeric',
            'length' => 'required|numeric',
            'passengers' => 'required|numeric',
        ]);

        $boat = BoatDetail::create($validatedData);

        return response()->json($boat, 201);
    }
}
