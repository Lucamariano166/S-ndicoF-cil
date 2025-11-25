<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidade extends Model
{
    protected $fillable = [
        'condominio_id',
        'numero',
        'bloco',
        'tipo',
        'metragem',
        'vagas_garagem',
        'observacoes',
    ];

    protected $casts = [
        'metragem' => 'decimal:2',
        'vagas_garagem' => 'integer',
    ];

    // Relacionamentos
    public function condominio(): BelongsTo
    {
        return $this->belongsTo(Condominio::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Acessors
    public function getIdentificacaoAttribute(): string
    {
        $parts = array_filter([$this->bloco, $this->numero]);
        return implode(' - ', $parts);
    }
}
