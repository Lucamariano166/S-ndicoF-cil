<?php

namespace App\Policies;

use App\Models\Despesa;
use App\Models\User;

class DespesaPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_despesas') || $user->can('manage_despesas');
    }

    public function view(User $user, Despesa $despesa): bool
    {
        return $user->can('view_despesas') || $user->can('manage_despesas');
    }

    public function create(User $user): bool
    {
        return $user->can('manage_despesas');
    }

    public function update(User $user, Despesa $despesa): bool
    {
        return $user->can('manage_despesas');
    }

    public function delete(User $user, Despesa $despesa): bool
    {
        return $user->can('manage_despesas');
    }

    public function restore(User $user, Despesa $despesa): bool
    {
        return $user->can('manage_despesas');
    }

    public function forceDelete(User $user, Despesa $despesa): bool
    {
        return $user->can('manage_despesas');
    }
}
