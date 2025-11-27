<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comunicado extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'condominio_id', 'user_id', 'titulo', 'mensagem', 'prioridade', 'anexos',
        'tipo_destinatarios', 'destinatarios', 'enviado_em',
        'enviar_email', 'enviar_whatsapp', 'publicar_mural',
        'requer_confirmacao', 'confirmacoes_leitura',
        'total_destinatarios', 'total_leituras', 'status', 'agendar_para'
    ];

    protected $casts = [
        'anexos' => 'array',
        'destinatarios' => 'array',
        'confirmacoes_leitura' => 'array',
        'enviar_email' => 'boolean',
        'enviar_whatsapp' => 'boolean',
        'publicar_mural' => 'boolean',
        'requer_confirmacao' => 'boolean',
        'enviado_em' => 'datetime',
        'agendar_para' => 'datetime',
    ];

    public function condominio(): BelongsTo
    {
        return $this->belongsTo(Condominio::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeEnviados($query)
    {
        return $query->where('status', 'enviado');
    }
}
