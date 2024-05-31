<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    /**
     * Create a new policy instance.
     */

    use HandlesAuthorization;

    public function __construct()
    {
        //
    }
}
