<?php

namespace App\Policies;

use App\Models\Unidade;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UnidadePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_unidades');
    }

    public function view(User $user, Unidade $unidade): bool
    {
        return $user->hasPermissionTo('view_unidades');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_unidades');
    }

    public function update(User $user, Unidade $unidade): bool
    {
        return $user->hasPermissionTo('edit_unidades');
    }

    public function delete(User $user, Unidade $unidade): bool
    {
        return $user->hasPermissionTo('delete_unidades');
    }

    public function restore(User $user, Unidade $unidade): bool
    {
        return $user->hasPermissionTo('delete_unidades');
    }

    public function forceDelete(User $user, Unidade $unidade): bool
    {
        return $user->hasPermissionTo('delete_unidades');
    }
}
