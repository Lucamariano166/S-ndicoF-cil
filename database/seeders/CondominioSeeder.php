<?php

namespace Database\Seeders;

use App\Models\Condominio;
use App\Models\Unidade;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CondominioSeeder extends Seeder
{
    public function run(): void
    {
        // Criar condomínio de exemplo
        $condominio = Condominio::create([
            'nome' => 'Residencial Exemplo',
            'cnpj' => '12.345.678/0001-90',
            'cep' => '70000-000',
            'endereco' => 'Rua das Flores',
            'numero' => '123',
            'bairro' => 'Centro',
            'cidade' => 'Brasília',
            'estado' => 'DF',
            'total_unidades' => 20,
            'plano' => 'standard',
            'trial_ends_at' => now()->addDays(14),
            'ativo' => true,
        ]);

        // Criar unidades
        // Bloco A - 10 apartamentos
        for ($i = 101; $i <= 110; $i++) {
            Unidade::create([
                'condominio_id' => $condominio->id,
                'numero' => (string) $i,
                'bloco' => 'A',
                'tipo' => 'apartamento',
                'metragem' => rand(50, 100),
                'vagas_garagem' => rand(1, 2),
            ]);
        }

        // Bloco B - 10 apartamentos
        for ($i = 201; $i <= 210; $i++) {
            Unidade::create([
                'condominio_id' => $condominio->id,
                'numero' => (string) $i,
                'bloco' => 'B',
                'tipo' => 'apartamento',
                'metragem' => rand(50, 100),
                'vagas_garagem' => rand(1, 2),
            ]);
        }

        // Atribuir role Super Admin ao usuário admin existente
        $adminUser = User::where('email', 'lucamariano.lm166@gmail.com')->first();
        if ($adminUser) {
            $adminUser->assignRole('super_admin');
        }

        // Criar síndico
        $sindico = User::create([
            'name' => 'João Silva',
            'email' => 'sindico@exemplo.com',
            'password' => Hash::make('password'),
            'condominio_id' => $condominio->id,
            'unidade_id' => Unidade::where('numero', '101')->first()->id,
            'whatsapp' => '(61) 99999-0001',
            'cpf' => '111.111.111-11',
            'ativo' => true,
        ]);
        $sindico->assignRole('sindico');

        // Criar alguns moradores
        $morador1 = User::create([
            'name' => 'Maria Santos',
            'email' => 'maria@exemplo.com',
            'password' => Hash::make('password'),
            'condominio_id' => $condominio->id,
            'unidade_id' => Unidade::where('numero', '102')->first()->id,
            'whatsapp' => '(61) 99999-0002',
            'cpf' => '222.222.222-22',
            'ativo' => true,
        ]);
        $morador1->assignRole('morador');

        $morador2 = User::create([
            'name' => 'Pedro Oliveira',
            'email' => 'pedro@exemplo.com',
            'password' => Hash::make('password'),
            'condominio_id' => $condominio->id,
            'unidade_id' => Unidade::where('numero', '201')->first()->id,
            'whatsapp' => '(61) 99999-0003',
            'cpf' => '333.333.333-33',
            'ativo' => true,
        ]);
        $morador2->assignRole('morador');

        // Criar porteiro
        $porteiro = User::create([
            'name' => 'Carlos Portaria',
            'email' => 'porteiro@exemplo.com',
            'password' => Hash::make('password'),
            'condominio_id' => $condominio->id,
            'whatsapp' => '(61) 99999-0004',
            'cpf' => '444.444.444-44',
            'ativo' => true,
        ]);
        $porteiro->assignRole('porteiro');
    }
}
