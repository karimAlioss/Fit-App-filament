<?php

namespace App\Models;

use App\Enums\AmaoType;
use App\Enums\AmoeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    public function lotissements(): HasMany
    {
        return $this->hasMany(Lotissements::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function method(): BelongsTo
    {
        return $this->belongsTo(Method::class);
    }

    public function sponsor(): BelongsTo
    {
        return $this->belongsTo(Sponsor::class);
    }

    public function prestataire(): BelongsTo
    {
        return $this->belongsTo(Prestataire::class);
    }

    public function statu(): BelongsTo
    {
        return $this->belongsTo(Statu::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
