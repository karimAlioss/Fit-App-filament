<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
