<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->cascadeOnDelete();
            $table->string('descricao');
            $table->text('observacoes')->nullable();
            $table->enum('categoria', [
                'manutencao',
                'limpeza',
                'seguranca',
                'energia',
                'agua',
                'gas',
                'internet',
                'elevador',
                'jardinagem',
                'administracao',
                'impostos',
                'seguros',
                'juridico',
                'obras',
                'outros'
            ]);
            $table->decimal('valor', 10, 2);
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->enum('status', ['pendente', 'paga', 'vencida', 'cancelada'])->default('pendente');
            $table->string('fornecedor')->nullable();
            $table->string('numero_nota')->nullable();
            $table->json('comprovantes')->nullable()->comment('Array de caminhos de arquivos');
            $table->foreignId('pago_por')->nullable()->constrained('users')->comment('Usuário que registrou o pagamento');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['condominio_id', 'status']);
            $table->index(['condominio_id', 'data_vencimento']);
            $table->index(['condominio_id', 'categoria']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('despesas');
    }
};
