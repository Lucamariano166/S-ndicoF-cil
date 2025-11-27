<?php

namespace App\Policies;

use App\Models\Reserva;
use App\Models\User;

class ReservaPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_reservas');
    }

    public function view(User $user, Reserva $reserva): bool
    {
        return $user->hasPermissionTo('view_reservas');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_reservas');
    }

    public function update(User $user, Reserva $reserva): bool
    {
        return $user->hasPermissionTo('manage_reservas');
    }

    public function delete(User $user, Reserva $reserva): bool
    {
        return $user->hasPermissionTo('manage_reservas');
    }

    public function restore(User $user, Reserva $reserva): bool
    {
        return $user->hasPermissionTo('manage_reservas');
    }

    public function forceDelete(User $user, Reserva $reserva): bool
    {
        return $user->hasPermissionTo('manage_reservas');
    }
}
