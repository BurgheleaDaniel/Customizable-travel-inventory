<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelsSeeder extends Seeder
{
    public function run(): void
    {
        $hotels = [
            [
                'name' => 'Hotel Seaside',
                'description' => 'A luxurious beachfront getaway offering serene views and top-notch amenities.',
                'license' => 'by The Trip Boutique',
                'address' => '123 Coastal Ave, Sunnytown',
                'rating' => 4,
                'facilities' => [1, 2, 3, 4, 5],
            ],
        ];

        foreach ($hotels as $hotelData) {
            $hotel = Hotel::create([
                'name' => $hotelData['name'],
                'description' => $hotelData['description'],
                'license' => $hotelData['license'],
                'address' => $hotelData['address'],
                'rating' => $hotelData['rating'],
            ]);

            $hotel->facilities()->attach($hotelData['facilities']);
        }
    }
}
