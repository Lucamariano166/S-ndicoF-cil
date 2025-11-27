<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'condominio_id', 'unidade_id', 'user_id', 'espaco', 'espaco_outro',
        'data_reserva', 'hora_inicio', 'hora_fim', 'finalidade', 'numero_convidados', 'observacoes',
        'valor_taxa', 'valor_caucao', 'taxa_paga', 'caucao_paga', 'pago_em',
        'status', 'confirmada_em', 'cancelada_em', 'motivo_cancelamento',
        'danos_reportados', 'relatorio_danos', 'caucao_devolvida', 'caucao_devolvida_em'
    ];

    protected $casts = [
        'data_reserva' => 'date',
        'hora_inicio' => 'datetime',
        'hora_fim' => 'datetime',
        'taxa_paga' => 'boolean',
        'caucao_paga' => 'boolean',
        'danos_reportados' => 'boolean',
        'caucao_devolvida' => 'boolean',
        'pago_em' => 'datetime',
        'confirmada_em' => 'datetime',
        'cancelada_em' => 'datetime',
        'caucao_devolvida_em' => 'datetime',
    ];

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

    public function scopePendentes($query)
    {
        return $query->where('status', 'pendente');
    }

    public function scopeConfirmadas($query)
    {
        return $query->where('status', 'confirmada');
    }
}
