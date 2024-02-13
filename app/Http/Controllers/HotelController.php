<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::with('facilities')->get();
        return response()->json(['message' => 'Hotels retrieved successfully', 'data' => $hotels], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'rating' => 'required|numeric',
        ]);

        $hotel = Hotel::create($validatedData);

        return response()->json(['message' => 'Hotel created successfully', 'data' => $hotel], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
