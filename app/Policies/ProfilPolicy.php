<?php

namespace App\Policies;

use App\Models\Pelamar;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfilPolicy
{
    public function view(User $user)
    {
        return $user->role == 'pelamar'
            ? Response::allow()
            : Response::denyWithStatus(404);
    }
}
