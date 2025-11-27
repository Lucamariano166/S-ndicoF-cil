<?php

namespace App\Policies;

use App\Models\Boleto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BoletoPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_boletos');
    }

    public function view(User $user, Boleto $boleto): bool
    {
        return $user->hasPermissionTo('view_boletos');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_boletos');
    }

    public function update(User $user, Boleto $boleto): bool
    {
        return $user->hasPermissionTo('manage_boletos');
    }

    public function delete(User $user, Boleto $boleto): bool
    {
        return $user->hasPermissionTo('manage_boletos');
    }

    public function restore(User $user, Boleto $boleto): bool
    {
        return $user->hasPermissionTo('manage_boletos');
    }

    public function forceDelete(User $user, Boleto $boleto): bool
    {
        return $user->hasPermissionTo('manage_boletos');
    }
}
