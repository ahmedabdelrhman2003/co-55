<?php

namespace App\Models\job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Job extends Model
{
    use HasFactory;
    public $timestamps = true;
    public function jobs_files(): HasMany
    {
        return $this->hasMany(JobsFile::class);
    }
    public function job_titles(): BelongsTo
    {
        return $this->belongsTo(JobsTitle::class, 'title_id', '');
    }
}
