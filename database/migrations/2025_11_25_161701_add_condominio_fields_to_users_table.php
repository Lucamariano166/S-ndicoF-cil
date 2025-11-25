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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('condominio_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            $table->foreignId('unidade_id')->nullable()->after('condominio_id')->constrained()->nullOnDelete();
            $table->string('whatsapp')->nullable()->after('email');
            $table->string('cpf')->nullable()->after('whatsapp');
            $table->boolean('ativo')->default(true)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['condominio_id']);
            $table->dropForeign(['unidade_id']);
            $table->dropColumn(['condominio_id', 'unidade_id', 'whatsapp', 'cpf', 'ativo']);
        });
    }
};
