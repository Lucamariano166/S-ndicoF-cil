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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->cascadeOnDelete();
            $table->foreignId('unidade_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // morador que reservou

            // Espaço reservado
            $table->enum('espaco', [
                'salao_festas',
                'churrasqueira_1',
                'churrasqueira_2',
                'churrasqueira_3',
                'quadra_esportes',
                'piscina',
                'sala_jogos',
                'espaco_gourmet',
                'outro'
            ]);
            $table->string('espaco_outro')->nullable(); // se espaco = 'outro'

            // Data e horário
            $table->date('data_reserva');
            $table->time('hora_inicio');
            $table->time('hora_fim');

            // Dados da reserva
            $table->string('finalidade')->nullable(); // festa, churrasco, reunião, etc
            $table->integer('numero_convidados')->nullable();
            $table->text('observacoes')->nullable();

            // Pagamento/Caução
            $table->decimal('valor_taxa', 10, 2)->nullable();
            $table->decimal('valor_caucao', 10, 2)->nullable();
            $table->boolean('taxa_paga')->default(false);
            $table->boolean('caucao_paga')->default(false);
            $table->timestamp('pago_em')->nullable();

            // Confirmação
            $table->enum('status', [
                'pendente',      // aguardando aprovação
                'confirmada',    // aprovada pelo síndico
                'realizada',     // evento já ocorreu
                'cancelada',     // cancelada pelo morador
                'rejeitada'      // rejeitada pelo síndico
            ])->default('pendente');

            $table->timestamp('confirmada_em')->nullable();
            $table->timestamp('cancelada_em')->nullable();
            $table->text('motivo_cancelamento')->nullable();

            // Avaliação pós-uso
            $table->boolean('danos_reportados')->default(false);
            $table->text('relatorio_danos')->nullable();
            $table->boolean('caucao_devolvida')->default(false);
            $table->timestamp('caucao_devolvida_em')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->index('condominio_id');
            $table->index('unidade_id');
            $table->index('data_reserva');
            $table->index('status');
            $table->index(['espaco', 'data_reserva']); // buscar disponibilidade
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
