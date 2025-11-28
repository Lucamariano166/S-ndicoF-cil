<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Criar usuário admin fixo para teste
        $admin = User::firstOrCreate(
            ['email' => 'admin@sindico.com'],
            [
                'name' => 'Admin Sistema',
                'password' => Hash::make('admin123'),
                'cpf' => '000.000.000-00',
                'whatsapp' => '(61) 99999-9999',
                'ativo' => true,
            ]
        );

        $admin->assignRole('super_admin');
    }
}
