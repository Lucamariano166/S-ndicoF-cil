<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assembleia extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'condominio_id', 'user_id', 'titulo', 'descricao', 'tipo',
        'data_assembleia', 'local', 'endereco_completo', 'pauta',
        'data_convocacao', 'convocados', 'convocacao_enviada',
        'presentes', 'representados', 'quorum', 'votacoes', 'decisoes',
        'ata', 'ata_arquivo', 'ata_aprovada_em', 'status'
    ];

    protected $casts = [
        'pauta' => 'array',
        'convocados' => 'array',
        'convocacao_enviada' => 'boolean',
        'presentes' => 'array',
        'representados' => 'array',
        'votacoes' => 'array',
        'decisoes' => 'array',
        'data_assembleia' => 'datetime',
        'data_convocacao' => 'datetime',
        'ata_aprovada_em' => 'datetime',
    ];

    public function condominio(): BelongsTo
    {
        return $this->belongsTo(Condominio::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePendentes($query)
    {
        return $query->whereIn('status', ['agendada', 'convocada']);
    }
}
