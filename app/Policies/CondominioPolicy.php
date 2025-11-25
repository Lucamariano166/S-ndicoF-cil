<?php

namespace App\Policies;

use App\Models\Condominio;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CondominioPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_condominios');
    }

    public function view(User $user, Condominio $condominio): bool
    {
        return $user->hasPermissionTo('view_condominios');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_condominios');
    }

    public function update(User $user, Condominio $condominio): bool
    {
        return $user->hasPermissionTo('edit_condominios');
    }

    public function delete(User $user, Condominio $condominio): bool
    {
        return $user->hasPermissionTo('delete_condominios');
    }

    public function restore(User $user, Condominio $condominio): bool
    {
        return $user->hasPermissionTo('delete_condominios');
    }

    public function forceDelete(User $user, Condominio $condominio): bool
    {
        return $user->hasPermissionTo('delete_condominios');
    }
}
