<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrega extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'condominio_id',
        'unidade_id',
        'recebido_por',
        'retirado_por',
        'tipo',
        'remetente',
        'descricao',
        'foto',
        'assinatura',
        'status',
        'data_recebimento',
        'data_retirada',
        'observacoes',
    ];

    protected function casts(): array
    {
        return [
            'data_recebimento' => 'datetime',
            'data_retirada' => 'datetime',
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

    public function porteiro(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recebido_por');
    }

    public function morador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'retirado_por');
    }

    public function isPendente(): bool
    {
        return $this->status === 'pendente';
    }

    public function isRetirada(): bool
    {
        return $this->status === 'retirada';
    }

    public function getDiasEsperaAttribute(): int
    {
        if ($this->isPendente()) {
            return $this->data_recebimento->diffInDays(now());
        }

        if ($this->isRetirada() && $this->data_retirada) {
            return $this->data_recebimento->diffInDays($this->data_retirada);
        }

        return 0;
    }

    public function isAtrasada(): bool
    {
        return $this->isPendente() && $this->dias_espera > 7;
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pendente' => 'Pendente',
            'retirada' => 'Retirada',
            'devolvida' => 'Devolvida',
            default => $this->status,
        };
    }
}
