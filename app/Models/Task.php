<?php

namespace App\Models;

use App\Models\Scopes\TeamScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    public function livraison(): BelongsTo
    {
        return $this->belongsTo(Livraison::class);
    }

    public function statu(): BelongsTo
    {
        return $this->belongsTo(Statu::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('livraisonScope', function (Builder $builder) {
            $user = Auth::user();

            if ($user && $user->role_id !== 1) {
                $builder->whereHas('livraison.lotissement.project', function (Builder $query) use ($user) {
                    $query->where('team_id', $user->team_id);
                });
            }
        });
    }
}
