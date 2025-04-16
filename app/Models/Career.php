<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $guarded = [];

    // Relasi ke model Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Relasi ke model Location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
