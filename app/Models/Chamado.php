<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chamado extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'condominio_id',
        'unidade_id',
        'user_id',
        'atribuido_para',
        'titulo',
        'descricao',
        'categoria',
        'status',
        'prioridade',
        'fotos',
        'observacoes',
        'resolvido_em',
        'fechado_em',
    ];

    protected function casts(): array
    {
        return [
            'fotos' => 'array',
            'resolvido_em' => 'datetime',
            'fechado_em' => 'datetime',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function responsavel(): BelongsTo
    {
        return $this->belongsTo(User::class, 'atribuido_para');
    }

    public function isAberto(): bool
    {
        return $this->status === 'aberto';
    }

    public function isResolvido(): bool
    {
        return $this->status === 'resolvido';
    }

    public function isFechado(): bool
    {
        return $this->status === 'fechado';
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'aberto' => 'Aberto',
            'em_andamento' => 'Em Andamento',
            'resolvido' => 'Resolvido',
            'fechado' => 'Fechado',
            'cancelado' => 'Cancelado',
            default => $this->status,
        };
    }

    public function getPrioridadeLabelAttribute(): string
    {
        return match ($this->prioridade) {
            'baixa' => 'Baixa',
            'media' => 'Média',
            'alta' => 'Alta',
            'urgente' => 'Urgente',
            default => $this->prioridade,
        };
    }
}
