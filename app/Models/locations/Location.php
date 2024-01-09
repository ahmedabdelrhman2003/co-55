<?php

namespace App\Models\locations;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $guarded = [];
    public function locations_icons(): HasMany
    {
        return $this->hasMany(LocationsIcon::class, 'locations_id');
    }
    public function locations_images(): HasMany
    {
        return $this->hasMany(LocationsImage::class, 'locations_id');
    }
}
