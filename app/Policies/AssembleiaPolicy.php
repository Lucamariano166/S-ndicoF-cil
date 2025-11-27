<?php

namespace App\Policies;

use App\Models\Assembleia;
use App\Models\User;

class AssembleiaPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_assembleias');
    }

    public function view(User $user, Assembleia $assembleia): bool
    {
        return $user->hasPermissionTo('view_assembleias');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_assembleias');
    }

    public function update(User $user, Assembleia $assembleia): bool
    {
        return $user->hasPermissionTo('manage_assembleias');
    }

    public function delete(User $user, Assembleia $assembleia): bool
    {
        return $user->hasPermissionTo('manage_assembleias');
    }

    public function restore(User $user, Assembleia $assembleia): bool
    {
        return $user->hasPermissionTo('manage_assembleias');
    }

    public function forceDelete(User $user, Assembleia $assembleia): bool
    {
        return $user->hasPermissionTo('manage_assembleias');
    }
}
