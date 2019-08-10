<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

define('ROLE_ADMIN', 9);
define('ROLE_PLAYER', 0);

class AccesoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function acceso(User $user)
    {
        // return $user->role == ROLE_ADMIN;
    }
}
