<?php

namespace Database\Seeders;

use App\Models\Boleto;
use App\Models\Condominio;
use App\Models\Unidade;
use Illuminate\Database\Seeder;

class BoletoSeeder extends Seeder
{
    public function run(): void
    {
        $condominio = Condominio::first();

        if (!$condominio) {
            return;
        }

        $unidades = Unidade::where('condominio_id', $condominio->id)->take(5)->get();

        foreach ($unidades as $unidade) {
            Boleto::create([
                'condominio_id' => $condominio->id,
                'unidade_id' => $unidade->id,
                'descricao' => 'Condomínio + Fundo de Reserva',
                'referencia' => '10/2025',
                'valor' => rand(300, 800),
                'vencimento' => now()->subDays(15),
                'data_pagamento' => now()->subDays(10),
                'status' => 'pago',
            ]);

            Boleto::create([
                'condominio_id' => $condominio->id,
                'unidade_id' => $unidade->id,
                'descricao' => 'Condomínio + Fundo de Reserva',
                'referencia' => '11/2025',
                'valor' => rand(300, 800),
                'vencimento' => now()->subDays(5),
                'status' => 'vencido',
            ]);

            Boleto::create([
                'condominio_id' => $condominio->id,
                'unidade_id' => $unidade->id,
                'descricao' => 'Condomínio + Fundo de Reserva',
                'referencia' => '12/2025',
                'valor' => rand(300, 800),
                'vencimento' => now()->addDays(10),
                'status' => 'pendente',
                'codigo_barras' => '23793.38128 60000.000008 00000.000009 1 99990000012345',
                'linha_digitavel' => '23793381286000000000800000000000919999000001234567',
            ]);
        }
    }
}
