<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livraison extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($livraison) {
            // Ensure that the lotissement relationship is loaded
            $livraison->load('lotissement.project');

            // Generate the reference
            $livraison->reference = 'LIV-' . $livraison->lotissement->project->id . $livraison->lotissement->id;
        });
    }

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
