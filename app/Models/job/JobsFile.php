<?php

namespace App\Models\job;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsFile extends Model
{
    public $timestamps = true;
    use HasFactory;
    public function jobs(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
