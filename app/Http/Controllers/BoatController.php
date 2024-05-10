<?php

namespace App\Http\Controllers;
use App\Models\Boat;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    public function data()
    {
        $boats = Boat::all();
        return response()->json($boats);
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|numeric',

        'title' => 'required|string',
        'subtitle' => 'required|string',
        'image' => 'required|string',
        'link' => 'required|string',
        'price' => 'required|string',
    ]);

    $boat = Boat::create($validatedData);

    return response()->json($boat, 201);
}

}
