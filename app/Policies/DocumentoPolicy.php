<?php

namespace App\Policies;

use App\Models\Documento;
use App\Models\User;

class DocumentoPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view_documentos');
    }

    public function view(User $user, Documento $documento): bool
    {
        return $user->hasPermissionTo('view_documentos');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create_documentos');
    }

    public function update(User $user, Documento $documento): bool
    {
        return $user->hasPermissionTo('manage_documentos');
    }

    public function delete(User $user, Documento $documento): bool
    {
        return $user->hasPermissionTo('manage_documentos');
    }

    public function restore(User $user, Documento $documento): bool
    {
        return $user->hasPermissionTo('manage_documentos');
    }

    public function forceDelete(User $user, Documento $documento): bool
    {
        return $user->hasPermissionTo('manage_documentos');
    }
}
