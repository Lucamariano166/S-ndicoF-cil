<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Documento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'condominio_id',
        'user_id',
        'titulo',
        'descricao',
        'categoria',
        'tags',
        'arquivo',
        'arquivo_nome',
        'arquivo_tipo',
        'arquivo_tamanho',
        'publico',
        'link_compartilhamento',
        'link_expira_em',
        'versao',
        'documento_original_id',
        'data_documento',
        'visualizacoes',
        'ultima_visualizacao',
    ];

    protected $casts = [
        'tags' => 'array',
        'publico' => 'boolean',
        'link_expira_em' => 'datetime',
        'data_documento' => 'datetime',
        'ultima_visualizacao' => 'datetime',
    ];

    // Relationships
    public function condominio(): BelongsTo
    {
        return $this->belongsTo(Condominio::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function documentoOriginal(): BelongsTo
    {
        return $this->belongsTo(Documento::class, 'documento_original_id');
    }

    public function versoes(): HasMany
    {
        return $this->hasMany(Documento::class, 'documento_original_id');
    }

    // Helpers
    public function getTamanhoFormatadoAttribute(): string
    {
        if (!$this->arquivo_tamanho) {
            return 'N/A';
        }

        $bytes = $this->arquivo_tamanho;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes >= 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function gerarLinkCompartilhamento(): string
    {
        $this->link_compartilhamento = Str::random(32);
        $this->link_expira_em = now()->addDays(7); // expira em 7 dias
        $this->save();

        return route('documentos.compartilhado', $this->link_compartilhamento);
    }

    public function linkValido(): bool
    {
        if (!$this->link_compartilhamento) {
            return false;
        }

        if ($this->link_expira_em && $this->link_expira_em < now()) {
            return false;
        }

        return true;
    }

    public function registrarVisualizacao(): void
    {
        $this->increment('visualizacoes');
        $this->update(['ultima_visualizacao' => now()]);
    }

    public function criarNovaVersao(array $dados): self
    {
        $novaVersao = static::create([
            ...$dados,
            'versao' => $this->versao + 1,
            'documento_original_id' => $this->documento_original_id ?? $this->id,
        ]);

        return $novaVersao;
    }

    // Scopes
    public function scopePublicos($query)
    {
        return $query->where('publico', true);
    }

    public function scopePorCategoria($query, string $categoria)
    {
        return $query->where('categoria', $categoria);
    }

    public function scopeComTags($query, array $tags)
    {
        return $query->whereJsonContains('tags', $tags);
    }
}
