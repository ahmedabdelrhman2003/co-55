<?php

namespace App\Models\job;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsFile extends Model
{
    use HasFactory;
    public function jobs(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
