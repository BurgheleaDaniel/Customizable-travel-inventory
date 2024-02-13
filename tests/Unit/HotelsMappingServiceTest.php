<?php

namespace Tests\Unit;

use App\Models\Facility;
use App\Models\Hotel;
use App\Models\HotelsMapping;
use App\Models\Source;
use App\Services\HotelsMappingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HotelsMappingServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $hotelsMappingService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->hotelsMappingService = new HotelsMappingService();
        Source::factory()->create();
        Facility::factory()->times(6)->create();
    }

    /** @test */
    public function it_can_create_a_hotels_mapping_with_facilities()
    {
        $hotel = Hotel::factory()->create();
        $facilities = [1, 2, 3];

        $data = [
            'hotel_id' => $hotel->id,
            'source_id' => Source::all()->random()->id,
            'facilities' => $facilities,
        ];

        $createdHotelsMapping = $this->hotelsMappingService->create($data);

        $this->assertInstanceOf(HotelsMapping::class, $createdHotelsMapping);
        $this->assertDatabaseHas('hotels_mappings', [
            'hotel_id' => $hotel->id,
            'source_id' => Source::all()->random()->id,
        ]);
        $this->assertDatabaseHas('facility_hotel_mappings', [
            'hotels_mappings_id' => $createdHotelsMapping->id,
            'facility_id' => $facilities[0],
        ]);
    }

    /** @test */
    public function it_can_get_customized_hotel_data()
    {
        $hotel = Hotel::factory()->create();
        $source_id = Source::all()->random()->id;
        $hotelsMapping = HotelsMapping::factory()->create([
            'hotel_id' => $hotel->id,
            'source_id' => $source_id
        ]);

        $customizedHotelData = $this->hotelsMappingService->getCustomizedHotel($hotel->id, $source_id);
        $this->assertEquals($hotel->id, $customizedHotelData['id']);
        $this->assertNotEquals($hotel->name, $customizedHotelData['name']);
    }
}
