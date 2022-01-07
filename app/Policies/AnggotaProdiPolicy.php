<?php

namespace App\Policies;

use App\Models\AnggotaProdi;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnggotaProdiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AnggotaProdi  $anggotaProdi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AnggotaProdi $anggotaProdi)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AnggotaProdi  $anggotaProdi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AnggotaProdi $anggotaProdi)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AnggotaProdi  $anggotaProdi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AnggotaProdi $anggotaProdi)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AnggotaProdi  $anggotaProdi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AnggotaProdi $anggotaProdi)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AnggotaProdi  $anggotaProdi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AnggotaProdi $anggotaProdi)
    {
        //
    }
}
