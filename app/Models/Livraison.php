<?php

namespace App\Models;

use App\Models\Scopes\TeamScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

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

    protected static function booted()
    {
        static::addGlobalScope('lotissementScope', function (Builder $builder) {
            $user = Auth::user();

            if ($user && $user->role_id !== 1) {
                $builder->whereHas('lotissement.project', function (Builder $query) use ($user) {
                    $query->where('team_id', $user->team_id);
                });
            }
        });
    }
}
