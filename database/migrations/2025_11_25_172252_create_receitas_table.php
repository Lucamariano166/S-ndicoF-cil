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
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->cascadeOnDelete();
            $table->string('descricao');
            $table->text('observacoes')->nullable();
            $table->enum('tipo', [
                'taxa_condominio',
                'aluguel',
                'multa',
                'servico',
                'evento',
                'outros'
            ]);
            $table->decimal('valor', 10, 2);
            $table->date('data_competencia');
            $table->date('data_recebimento');
            $table->foreignId('boleto_id')->nullable()->constrained()->nullOnDelete()->comment('Vinculado a um boleto');
            $table->foreignId('unidade_id')->nullable()->constrained()->nullOnDelete()->comment('Unidade relacionada');
            $table->string('numero_recibo')->nullable();
            $table->string('comprovante')->nullable()->comment('Arquivo do comprovante');
            $table->foreignId('registrado_por')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['condominio_id', 'data_competencia']);
            $table->index(['condominio_id', 'tipo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receitas');
    }
};
