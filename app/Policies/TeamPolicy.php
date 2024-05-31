<?php

namespace App\Policies;

use App\Models\User;

class TeamPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /*public function viewAny(): bool
    {
        return auth()->user()->role->tag === 'Admin';
    }*/

    public function create(): bool
    {
        return auth()->user()->role->tag === 'Admin';
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
