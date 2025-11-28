<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Rodar seeders na ordem correta
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            CondominioSeeder::class,
            BoletoSeeder::class,
            ChamadoSeeder::class,
            EntregaSeeder::class,
            FinanceiroSeeder::class,
            DocumentoSeeder::class,
            AssembleiaSeeder::class,
            ComunicadoSeeder::class,
            ReservaSeeder::class,
        ]);
    }
}
