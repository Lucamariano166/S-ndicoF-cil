<?php

namespace App\Policies;

use App\Models\Receita;
use App\Models\User;

class ReceitaPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_receitas') || $user->can('manage_receitas');
    }

    public function view(User $user, Receita $receita): bool
    {
        return $user->can('view_receitas') || $user->can('manage_receitas');
    }

    public function create(User $user): bool
    {
        return $user->can('manage_receitas');
    }

    public function update(User $user, Receita $receita): bool
    {
        return $user->can('manage_receitas');
    }

    public function delete(User $user, Receita $receita): bool
    {
        return $user->can('manage_receitas');
    }

    public function restore(User $user, Receita $receita): bool
    {
        return $user->can('manage_receitas');
    }

    public function forceDelete(User $user, Receita $receita): bool
    {
        return $user->can('manage_receitas');
    }
}
