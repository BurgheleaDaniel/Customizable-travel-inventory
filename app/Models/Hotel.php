<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
}
