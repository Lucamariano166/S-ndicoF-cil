<?php

namespace App\Policies;

use App\Models\Comunicado;
use App\Models\User;

class ComunicadoPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_comunicados');
    }

    public function view(User $user, Comunicado $comunicado): bool
    {
        return $user->hasPermissionTo('view_comunicados');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_comunicados');
    }

    public function update(User $user, Comunicado $comunicado): bool
    {
        return $user->hasPermissionTo('manage_comunicados');
    }

    public function delete(User $user, Comunicado $comunicado): bool
    {
        return $user->hasPermissionTo('manage_comunicados');
    }

    public function restore(User $user, Comunicado $comunicado): bool
    {
        return $user->hasPermissionTo('manage_comunicados');
    }

    public function forceDelete(User $user, Comunicado $comunicado): bool
    {
        return $user->hasPermissionTo('manage_comunicados');
    }
}
