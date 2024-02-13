<?php

namespace App\Services;

use App\Models\Hotel;
use App\Models\HotelsMapping;
use Illuminate\Support\Facades\DB;


class HotelsMappingService
{
    public function create(array $data): HotelsMapping
    {
        return DB::transaction(function () use ($data) {
            $hotelsMapping = HotelsMapping::create($data);

            if (isset($data['facilities'])) {
                $hotelsMapping->facilities()->sync($data['facilities']);
            }

            return $hotelsMapping;
        });
    }

    public function getCustomizedHotel(int $hotelId, int $sourceId): array
    {
        $hotelsMapping = HotelsMapping::where('source_id', $sourceId)
            ->where('hotel_id', $hotelId)
            ->with('facilities')
            ->first();

        $hotel = Hotel::find($hotelId);

        return [
            'id' => $hotel->id,
            'name' => $hotelsMapping->name ?? $hotel->name,
            'description' => $hotelsMapping->description ?? $hotel->description,
            'license' => $hotelsMapping->license ?? $hotel->license,
            'address' => $hotelsMapping->address ?? $hotel->address,
            'rating' => $hotelsMapping->rating ?? $hotel->rating,
            'facilities' => (!empty($hotelsMapping->facilities) && count($hotelsMapping->facilities)) ? $hotelsMapping->facilities : $hotel->facilities,
        ];
    }
}
