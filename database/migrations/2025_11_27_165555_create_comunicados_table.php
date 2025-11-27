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
        Schema::create('comunicados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // autor

            // Dados do comunicado
            $table->string('titulo');
            $table->text('mensagem');
            $table->enum('prioridade', ['baixa', 'normal', 'alta', 'urgente'])->default('normal');
            $table->json('anexos')->nullable(); // arquivos anexos

            // Destinatários
            $table->enum('tipo_destinatarios', [
                'todos',           // todos os moradores
                'sindicos',        // apenas síndicos
                'proprietarios',   // apenas proprietários
                'inquilinos',      // apenas inquilinos
                'blocos',          // por bloco
                'unidades',        // unidades específicas
                'personalizado'    // seleção manual
            ])->default('todos');
            $table->json('destinatarios')->nullable(); // IDs específicos se personalizado/blocos/unidades

            // Envio
            $table->timestamp('enviado_em')->nullable();
            $table->boolean('enviar_email')->default(true);
            $table->boolean('enviar_whatsapp')->default(false);
            $table->boolean('publicar_mural')->default(true); // mural virtual

            // Confirmação de leitura
            $table->boolean('requer_confirmacao')->default(false);
            $table->json('confirmacoes_leitura')->nullable(); // IDs dos que confirmaram
            $table->integer('total_destinatarios')->default(0);
            $table->integer('total_leituras')->default(0);

            // Status
            $table->enum('status', [
                'rascunho',
                'agendado',
                'enviado',
                'arquivado'
            ])->default('rascunho');
            $table->timestamp('agendar_para')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->index('condominio_id');
            $table->index('status');
            $table->index('enviado_em');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunicados');
    }
};
