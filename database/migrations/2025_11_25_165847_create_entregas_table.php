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
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->onDelete('cascade');
            $table->foreignId('unidade_id')->constrained()->onDelete('cascade');
            $table->foreignId('recebido_por')->nullable()->constrained('users')->nullOnDelete()->comment('Porteiro que registrou');
            $table->foreignId('retirado_por')->nullable()->constrained('users')->nullOnDelete()->comment('Morador que retirou');

            $table->enum('tipo', ['encomenda', 'correspondencia', 'outro'])->default('encomenda');
            $table->string('remetente')->nullable();
            $table->text('descricao')->nullable();

            $table->string('foto')->nullable()->comment('Foto da encomenda');
            $table->string('assinatura')->nullable()->comment('Assinatura digital na retirada');

            $table->enum('status', ['pendente', 'retirada', 'devolvida'])->default('pendente');

            $table->timestamp('data_recebimento')->useCurrent();
            $table->timestamp('data_retirada')->nullable();
            $table->text('observacoes')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['condominio_id', 'status']);
            $table->index(['unidade_id', 'data_recebimento']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
