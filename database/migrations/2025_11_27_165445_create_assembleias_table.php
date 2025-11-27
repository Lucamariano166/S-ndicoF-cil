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
        Schema::create('assembleias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // organizador

            // Dados básicos
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->enum('tipo', ['ordinaria', 'extraordinaria']);

            // Data e local
            $table->timestamp('data_assembleia');
            $table->string('local')->nullable();
            $table->text('endereco_completo')->nullable();

            // Pauta
            $table->json('pauta')->nullable(); // array de itens da pauta

            // Convocação
            $table->timestamp('data_convocacao')->nullable();
            $table->json('convocados')->nullable(); // IDs dos convocados
            $table->boolean('convocacao_enviada')->default(false);

            // Presença
            $table->json('presentes')->nullable(); // IDs dos presentes
            $table->json('representados')->nullable(); // representações (procurações)
            $table->integer('quorum')->nullable(); // percentual

            // Deliberações
            $table->json('votacoes')->nullable(); // resultados das votações
            $table->json('decisoes')->nullable(); // decisões tomadas

            // Ata
            $table->text('ata')->nullable(); // texto da ata
            $table->string('ata_arquivo')->nullable(); // PDF da ata assinada
            $table->timestamp('ata_aprovada_em')->nullable();

            // Status
            $table->enum('status', [
                'agendada',
                'convocada',
                'realizada',
                'cancelada'
            ])->default('agendada');

            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->index('condominio_id');
            $table->index('data_assembleia');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assembleias');
    }
};
