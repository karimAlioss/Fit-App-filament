<?php

namespace App\Policies;

use App\Models\User;

class StatuPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool
    {
        return in_array($user->role->tag, ['Admin', 'Manager']);
    }

    public function create(User $user): bool
    {
        return in_array($user->role->tag, ['Admin', 'Manager']);
    }

    public function update(): bool
    {
        return auth()->user()->role->tag === 'Admin';
    }

    public function delete(): bool
    {
        return auth()->user()->role->tag === 'Admin';
    }
}
