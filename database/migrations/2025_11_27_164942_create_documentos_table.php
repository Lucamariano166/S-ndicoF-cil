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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condominio_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // quem fez upload

            // Dados do documento
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->enum('categoria', [
                'ata',
                'estatuto',
                'regimento',
                'contrato',
                'nota_fiscal',
                'laudo',
                'projeto',
                'convenio',
                'outros'
            ]);
            $table->json('tags')->nullable(); // busca e organização

            // Arquivo
            $table->string('arquivo'); // path do arquivo
            $table->string('arquivo_nome'); // nome original
            $table->string('arquivo_tipo')->nullable(); // pdf, doc, etc
            $table->unsignedBigInteger('arquivo_tamanho')->nullable(); // em bytes

            // Compartilhamento
            $table->boolean('publico')->default(false); // visível para todos os moradores
            $table->string('link_compartilhamento')->nullable()->unique();
            $table->timestamp('link_expira_em')->nullable();

            // Versionamento
            $table->unsignedInteger('versao')->default(1);
            $table->foreignId('documento_original_id')->nullable()->constrained('documentos')->nullOnDelete();

            // Metadata
            $table->timestamp('data_documento')->nullable(); // data do documento real
            $table->unsignedInteger('visualizacoes')->default(0);
            $table->timestamp('ultima_visualizacao')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->index('condominio_id');
            $table->index('categoria');
            $table->index('publico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
