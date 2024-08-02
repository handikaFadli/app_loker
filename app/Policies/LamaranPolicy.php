<?php

namespace App\Policies;

use App\Models\Lamaran;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LamaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->role == 'admin' || $user->role == 'kaprodi' || $user->role == 'dekan'
            ? Response::allow()
            :  Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lamaran $lamaran)
    {
        return $user->role == 'admin' || $user->role == 'kaprodi' || $user->role == 'dekan'
            ? Response::allow()
            :  Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lamaran $lamaran)
    {
        return $user->role == 'admin'
            ? Response::allow()
            :  Response::denyWithStatus(404);
    }

    public function updateStatusLamaran(User $user, Lamaran $lamaran)
    {
        return $user->role == 'admin' || $user->role == 'kaprodi' || $user->role == 'dekan'
            ? Response::allow()
            :  Response::denyWithStatus(404);
    }

    public function cancelLamaran(User $user, Lamaran $lamaran)
    {
        return $user->role == 'pelamar'
            ? Response::allow()
            :  Response::denyWithStatus(404);
    }

    public function applyLamaran(User $user)
    {
        return $user->role == 'pelamar'
            ? Response::allow()
            :  Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lamaran $lamaran)
    {
        return $user->role == 'admin'
            ? Response::allow()
            :  Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lamaran $lamaran)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lamaran $lamaran)
    {
        //
    }
}
