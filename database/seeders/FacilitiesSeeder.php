<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            ['name' => 'Spa'],
            ['name' => 'Gym'],
            ['name' => 'Pool'],
            ['name' => 'Restaurant'],
            ['name' => 'Free Wi-Fi'],
            ['name' => 'Private Beach'],
            ['name' => 'Rooftop Dining'],
            ['name' => 'Adventure Tours'],
            ['name' => 'Heated Pool'],
            ['name' => 'Exclusive Lounge'],
        ];

        Facility::insert($facilities);
    }
}
