<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Criar Roles
        $superAdmin = Role::create(['name' => 'super_admin']);
        $sindico = Role::create(['name' => 'sindico']);
        $morador = Role::create(['name' => 'morador']);
        $porteiro = Role::create(['name' => 'porteiro']);
        $administradora = Role::create(['name' => 'administradora']);

        // Criar Permissions (exemplos básicos)
        // Condomínios
        Permission::create(['name' => 'view_condominios']);
        Permission::create(['name' => 'create_condominios']);
        Permission::create(['name' => 'edit_condominios']);
        Permission::create(['name' => 'delete_condominios']);

        // Unidades
        Permission::create(['name' => 'view_unidades']);
        Permission::create(['name' => 'create_unidades']);
        Permission::create(['name' => 'edit_unidades']);
        Permission::create(['name' => 'delete_unidades']);

        // Usuários
        Permission::create(['name' => 'view_users']);
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'edit_users']);
        Permission::create(['name' => 'delete_users']);

        // Boletos (para futuro)
        Permission::create(['name' => 'view_boletos']);
        Permission::create(['name' => 'create_boletos']);
        Permission::create(['name' => 'manage_boletos']);

        // Chamados
        Permission::create(['name' => 'view_chamados']);
        Permission::create(['name' => 'create_chamados']);
        Permission::create(['name' => 'resolve_chamados']);

        // Entregas
        Permission::create(['name' => 'view_entregas']);
        Permission::create(['name' => 'create_entregas']);
        Permission::create(['name' => 'manage_entregas']);

        // Despesas
        Permission::create(['name' => 'view_despesas']);
        Permission::create(['name' => 'create_despesas']);
        Permission::create(['name' => 'manage_despesas']);

        // Receitas
        Permission::create(['name' => 'view_receitas']);
        Permission::create(['name' => 'create_receitas']);
        Permission::create(['name' => 'manage_receitas']);

        // Documentos
        Permission::create(['name' => 'view_documentos']);
        Permission::create(['name' => 'create_documentos']);
        Permission::create(['name' => 'manage_documentos']);

        // Assembleias
        Permission::create(['name' => 'view_assembleias']);
        Permission::create(['name' => 'create_assembleias']);
        Permission::create(['name' => 'manage_assembleias']);

        // Comunicados
        Permission::create(['name' => 'view_comunicados']);
        Permission::create(['name' => 'create_comunicados']);
        Permission::create(['name' => 'manage_comunicados']);

        // Reservas
        Permission::create(['name' => 'view_reservas']);
        Permission::create(['name' => 'create_reservas']);
        Permission::create(['name' => 'manage_reservas']);

        // Atribuir permissions aos roles
        // Super Admin tem todas
        $superAdmin->givePermissionTo(Permission::all());

        // Síndico - admin do condomínio
        $sindico->givePermissionTo([
            'view_condominios', 'edit_condominios',
            'view_unidades', 'create_unidades', 'edit_unidades', 'delete_unidades',
            'view_users', 'create_users', 'edit_users',
            'view_boletos', 'create_boletos', 'manage_boletos',
            'view_chamados', 'resolve_chamados',
            'view_entregas', 'manage_entregas',
            'view_despesas', 'create_despesas', 'manage_despesas',
            'view_receitas', 'create_receitas', 'manage_receitas',
            'view_documentos', 'create_documentos', 'manage_documentos',
            'view_assembleias', 'create_assembleias', 'manage_assembleias',
            'view_comunicados', 'create_comunicados', 'manage_comunicados',
            'view_reservas', 'create_reservas', 'manage_reservas',
        ]);

        // Morador - acesso limitado
        $morador->givePermissionTo([
            'view_boletos',
            'view_chamados', 'create_chamados',
            'view_entregas',
            'view_documentos',
            'view_assembleias',
            'view_comunicados',
            'view_reservas', 'create_reservas',
        ]);

        // Porteiro - gestão de entregas
        $porteiro->givePermissionTo([
            'view_entregas', 'create_entregas', 'manage_entregas',
            'view_chamados',
        ]);

        // Administradora - múltiplos condomínios
        $administradora->givePermissionTo([
            'view_condominios', 'create_condominios', 'edit_condominios',
            'view_unidades', 'create_unidades', 'edit_unidades',
            'view_users', 'create_users', 'edit_users',
            'view_boletos', 'manage_boletos',
            'view_chamados', 'resolve_chamados',
            'view_despesas', 'create_despesas', 'manage_despesas',
            'view_receitas', 'create_receitas', 'manage_receitas',
            'view_documentos', 'create_documentos', 'manage_documentos',
            'view_assembleias', 'create_assembleias', 'manage_assembleias',
            'view_comunicados', 'create_comunicados', 'manage_comunicados',
        ]);
    }
}
