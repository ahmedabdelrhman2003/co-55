<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $guard = [];
    use HasFactory;
    public function services_icons(): HasMany
    {
        return $this->hasMany(ServicesIcon::class, 'services_id');
    }
}
