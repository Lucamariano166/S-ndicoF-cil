<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo virtual para representar transações financeiras (union de Receitas e Despesas)
 * Usado apenas para relatórios
 */
class TransacaoFinanceira extends Model
{
    protected $table = 'receitas'; // Tabela base (será sobrescrita na query)

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'data' => 'date',
        'valor' => 'decimal:2',
    ];
}
