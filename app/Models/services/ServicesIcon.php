<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesIcon extends Model
{
    protected $guard = [];
    // protected $fillable = ['icon_name'];
    use HasFactory;
    public function services(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'services_id');
    }
}
