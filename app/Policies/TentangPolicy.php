<?php

namespace App\Policies;

use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TentangPolicy
{
    public function viewAny(User $user)
    {
        return $user->role == 'admin'
            ? Response::allow()
            :  Response::denyWithStatus(404);
    }

    public function update(User $user, Perusahaan $perusahaan)
    {
        return $user->role == 'admin'
            ? Response::allow()
            :  Response::denyWithStatus(404);
    }
}
