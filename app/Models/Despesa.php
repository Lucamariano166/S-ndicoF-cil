<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Despesa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'condominio_id',
        'descricao',
        'observacoes',
        'categoria',
        'valor',
        'data_vencimento',
        'data_pagamento',
        'status',
        'fornecedor',
        'numero_nota',
        'comprovantes',
        'pago_por',
    ];

    protected function casts(): array
    {
        return [
            'data_vencimento' => 'date',
            'data_pagamento' => 'date',
            'comprovantes' => 'array',
            'valor' => 'decimal:2',
        ];
    }

    public function condominio(): BelongsTo
    {
        return $this->belongsTo(Condominio::class);
    }

    public function pagador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pago_por');
    }

    public function isPendente(): bool
    {
        return $this->status === 'pendente';
    }

    public function isPaga(): bool
    {
        return $this->status === 'paga';
    }

    public function isVencida(): bool
    {
        return $this->status === 'pendente' && $this->data_vencimento->isPast();
    }

    public function getCategoriaLabelAttribute(): string
    {
        return match ($this->categoria) {
            'manutencao' => 'Manutenção',
            'limpeza' => 'Limpeza',
            'seguranca' => 'Segurança',
            'energia' => 'Energia',
            'agua' => 'Água',
            'gas' => 'Gás',
            'internet' => 'Internet',
            'elevador' => 'Elevador',
            'jardinagem' => 'Jardinagem',
            'administracao' => 'Administração',
            'impostos' => 'Impostos',
            'seguros' => 'Seguros',
            'juridico' => 'Jurídico',
            'obras' => 'Obras',
            'outros' => 'Outros',
            default => $this->categoria,
        };
    }
}
