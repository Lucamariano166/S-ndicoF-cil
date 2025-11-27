<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boleto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'condominio_id',
        'unidade_id',
        'descricao',
        'referencia',
        'valor',
        'vencimento',
        'data_pagamento',
        'status',
        'codigo_barras',
        'linha_digitavel',
        'arquivo_pdf',
        'observacoes',
    ];

    protected function casts(): array
    {
        return [
            'vencimento' => 'date',
            'data_pagamento' => 'date',
            'valor' => 'decimal:2',
        ];
    }

    public function condominio(): BelongsTo
    {
        return $this->belongsTo(Condominio::class);
    }

    public function unidade(): BelongsTo
    {
        return $this->belongsTo(Unidade::class);
    }

    public function isVencido(): bool
    {
        return $this->status === 'pendente' && $this->vencimento->isPast();
    }

    public function isPago(): bool
    {
        return $this->status === 'pago';
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pendente' => 'Pendente',
            'pago' => 'Pago',
            'vencido' => 'Vencido',
            'cancelado' => 'Cancelado',
            default => $this->status,
        };
    }
}
