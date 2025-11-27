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
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->onDelete('cascade');
            $table->foreignId('unidade_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Usuário que abriu o chamado');
            $table->foreignId('atribuido_para')->nullable()->constrained('users')->nullOnDelete()->comment('Usuário responsável');

            $table->string('titulo');
            $table->text('descricao');
            $table->string('categoria')->default('geral');

            $table->enum('status', ['aberto', 'em_andamento', 'resolvido', 'fechado', 'cancelado'])->default('aberto');
            $table->enum('prioridade', ['baixa', 'media', 'alta', 'urgente'])->default('media');

            $table->json('fotos')->nullable()->comment('Array de caminhos das fotos');
            $table->text('observacoes')->nullable();

            $table->timestamp('resolvido_em')->nullable();
            $table->timestamp('fechado_em')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['condominio_id', 'status']);
            $table->index(['user_id', 'created_at']);
            $table->index('categoria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
