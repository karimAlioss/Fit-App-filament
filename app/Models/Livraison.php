<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livraison extends Model
{
    use HasFactory;

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function lotissement(): BelongsTo
    {
        return $this->belongsTo(Lotissement::class);
    }

    public function statu(): BelongsTo
    {
        return $this->belongsTo(Statu::class);
    }
}
