<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receita extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'condominio_id',
        'descricao',
        'observacoes',
        'tipo',
        'valor',
        'data_competencia',
        'data_recebimento',
        'boleto_id',
        'unidade_id',
        'numero_recibo',
        'comprovante',
        'registrado_por',
    ];

    protected function casts(): array
    {
        return [
            'data_competencia' => 'date',
            'data_recebimento' => 'date',
            'valor' => 'decimal:2',
        ];
    }

    public function condominio(): BelongsTo
    {
        return $this->belongsTo(Condominio::class);
    }

    public function boleto(): BelongsTo
    {
        return $this->belongsTo(Boleto::class);
    }

    public function unidade(): BelongsTo
    {
        return $this->belongsTo(Unidade::class);
    }

    public function registrador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }

    public function getTipoLabelAttribute(): string
    {
        return match ($this->tipo) {
            'taxa_condominio' => 'Taxa de Condomínio',
            'aluguel' => 'Aluguel',
            'multa' => 'Multa',
            'servico' => 'Serviço',
            'evento' => 'Evento',
            'outros' => 'Outros',
            default => $this->tipo,
        };
    }
}
