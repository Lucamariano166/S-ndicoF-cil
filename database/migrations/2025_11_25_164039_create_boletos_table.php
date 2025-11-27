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
        Schema::create('boletos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->onDelete('cascade');
            $table->foreignId('unidade_id')->constrained()->onDelete('cascade');

            $table->string('descricao');
            $table->string('referencia')->comment('Mês/Ano de referência, ex: 11/2025');
            $table->decimal('valor', 10, 2);
            $table->date('vencimento');
            $table->date('data_pagamento')->nullable();

            $table->enum('status', ['pendente', 'pago', 'vencido', 'cancelado'])->default('pendente');

            $table->string('codigo_barras')->nullable();
            $table->string('linha_digitavel')->nullable();
            $table->string('arquivo_pdf')->nullable()->comment('Caminho do arquivo PDF');

            $table->text('observacoes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['condominio_id', 'status']);
            $table->index(['unidade_id', 'vencimento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletos');
    }
};
