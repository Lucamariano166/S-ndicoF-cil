<?php

namespace App\Policies;

use App\Models\Chamado;
use App\Models\User;

class ChamadoPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_chamados');
    }

    public function view(User $user, Chamado $chamado): bool
    {
        return $user->hasPermissionTo('view_chamados');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_chamados');
    }

    public function update(User $user, Chamado $chamado): bool
    {
        return $user->hasPermissionTo('resolve_chamados');
    }

    public function delete(User $user, Chamado $chamado): bool
    {
        return $user->hasPermissionTo('resolve_chamados');
    }

    public function restore(User $user, Chamado $chamado): bool
    {
        return $user->hasPermissionTo('resolve_chamados');
    }

    public function forceDelete(User $user, Chamado $chamado): bool
    {
        return $user->hasPermissionTo('resolve_chamados');
    }
}
