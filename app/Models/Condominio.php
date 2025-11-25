<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condominio extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'cnpj',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'total_unidades',
        'plano',
        'trial_ends_at',
        'ativo',
    ];

    protected $casts = [
        'trial_ends_at' => 'date',
        'ativo' => 'boolean',
    ];

    // Relacionamentos
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function unidades(): HasMany
    {
        return $this->hasMany(Unidade::class);
    }

    // Acessors
    public function getEnderecoCompletoAttribute(): string
    {
        $parts = array_filter([
            $this->endereco,
            $this->numero,
            $this->complemento,
            $this->bairro,
            $this->cidade,
            $this->estado,
        ]);

        return implode(', ', $parts);
    }

    public function isTrialActive(): bool
    {
        return $this->trial_ends_at && $this->trial_ends_at->isFuture();
    }
}
