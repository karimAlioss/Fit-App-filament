<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lotissement extends Model
{
    use HasFactory;

    public function livraisons(): HasMany
    {
        return $this->hasMany(Livraison::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function statu(): BelongsTo
    {
        return $this->belongsTo(Statu::class);
    }
}
