<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class TeamScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $user = Auth::user();

        if ($user && $user->role_id !== 1) {
            $builder->whereHas('teams', function (Builder $query) use ($user) {
                $query->whereIn('teams.id', $user->teams->pluck('id'));
            });
        }
    }
}
