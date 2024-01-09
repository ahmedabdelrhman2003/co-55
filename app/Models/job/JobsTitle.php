<?php

namespace App\Models\job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobsTitle extends Model
{
    protected $table = 'job_titles';
    use HasFactory;
}
