<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsMapping extends Model
{
    use HasFactory;

    protected $table = 'hotels_mappings';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['hotel_id', 'name', 'description', 'license', 'address', 'rating', 'source_id'];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'facility_hotel_mappings', 'hotels_mappings_id', 'facility_id');
    }
}
