<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = [
            ['name' => 'Default'],
            ['name' => 'Horizon'],
            ['name' => 'Dreams'],
        ];

        foreach ($sources as $source) {
            Source::create($source);
        }
    }
}
