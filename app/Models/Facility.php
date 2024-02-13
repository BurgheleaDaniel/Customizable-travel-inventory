<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

    public function hotelsMappings()
    {
        return $this->belongsToMany(HotelsMapping::class, 'facility_hotel_mappings', 'facility_id', 'hotels_mappings_id');
    }
}
