<?php

namespace App\Models;

use App\Models\Scopes\TeamScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

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

    protected static function booted()
    {
        static::addGlobalScope('projectScope', function (Builder $builder) {
            $user = Auth::user();

            if ($user && $user->role_id !== 1) {
                $builder->whereHas('project', function (Builder $query) use ($user) {
                    $query->whereHas('teams', function (Builder $teamQuery) use ($user) {
                        $teamQuery->whereIn('teams.id', $user->teams->pluck('id'));
                    });
                });
            }
        });
    }
}
