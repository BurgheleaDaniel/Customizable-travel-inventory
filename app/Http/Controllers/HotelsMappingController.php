<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelsMapping;
use App\Services\HotelsMappingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HotelsMappingController extends Controller
{
    protected $hotelsMappingService;

    public function __construct(HotelsMappingService $hotelsMappingService)
    {
        $this->hotelsMappingService = $hotelsMappingService;
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'nullable',
            'description' => 'nullable',
            'license' => 'nullable',
            'address' => 'nullable',
            'rating' => 'nullable|numeric',
            'source_id' => 'required|exists:sources,id',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:facilities,id',
        ]);

        $hotelsMapping = $this->hotelsMappingService->create($validatedData);

        return response()->json(['message' => 'HotelsMapping created successfully', 'data' => $hotelsMapping], 201);
    }

    public function listCustomizable(Request $request, $hotelId, $sourceId): JsonResponse
    {
        $customizedHotel = $this->hotelsMappingService->getCustomizedHotel($hotelId, $sourceId);

        return response()->json(['message' => 'Hotels retrieved successfully', 'data' => $customizedHotel], 200);
    }
}
