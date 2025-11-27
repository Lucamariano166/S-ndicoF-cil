<?php

namespace App\Policies;

use App\Models\Entrega;
use App\Models\User;

class EntregaPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_entregas');
    }

    public function view(User $user, Entrega $entrega): bool
    {
        return $user->hasPermissionTo('view_entregas');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_entregas');
    }

    public function update(User $user, Entrega $entrega): bool
    {
        return $user->hasPermissionTo('manage_entregas');
    }

    public function delete(User $user, Entrega $entrega): bool
    {
        return $user->hasPermissionTo('manage_entregas');
    }

    public function restore(User $user, Entrega $entrega): bool
    {
        return $user->hasPermissionTo('manage_entregas');
    }

    public function forceDelete(User $user, Entrega $entrega): bool
    {
        return $user->hasPermissionTo('manage_entregas');
    }
}
