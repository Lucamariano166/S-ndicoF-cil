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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->onDelete('cascade');
            $table->string('numero'); // Ex: 101, 201, Casa 1
            $table->string('bloco')->nullable(); // Ex: A, B, Torre 1
            $table->enum('tipo', ['apartamento', 'casa', 'sala', 'loja'])->default('apartamento');
            $table->decimal('metragem', 8, 2)->nullable();
            $table->integer('vagas_garagem')->default(0);
            $table->text('observacoes')->nullable();
            $table->timestamps();

            // Índice único para evitar unidades duplicadas no mesmo condomínio
            $table->unique(['condominio_id', 'bloco', 'numero']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
