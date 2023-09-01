<?php

namespace App\Models\locations;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationsImage extends Model
{

    use HasFactory;
    protected $guarded = [];

    public function locations(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'locations_id');
    }
}
