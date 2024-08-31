<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Produto extends Model
{
    use HasFactory, Searchable;

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'url_imagem',
        'criado_por', // Campo para armazenar o ID do usuário que criou o produto
    ];

    // Query Scopes para filtros personalizados
    public function scopeFilter(Builder $query, array $filters)
    {
        if ($nome = $filters['nome'] ?? null) {
            $query->where('nome', 'like', '%' . $nome . '%');
        }

        if ($descricao = $filters['descricao'] ?? false) {
            $query->where('descricao', 'like', '%' . $descricao . '%');
        }

        if ($preco_min = $filters['preco_min'] ?? null) {
            $query->where('preco', '>=', $preco_min);
        }

        if ($preco_max = $filters['preco_max'] ?? null) {
            $query->where('preco', '<=', $preco_max);
        }
    }

    // Função para armazenar uma imagem do produto
    public function storeImagem($imagem)
    {
        if ($imagem) {
            $path = $imagem->store('imagens', 'public'); // Caminho onde a imagem será salva
            $this->url_imagem = Storage::url($path); // Caminho completo para acessar a imagem
            $this->save(); // Salva o caminho da imagem no banco de dados
        }
    }

    // Define os campos que serão indexados para pesquisa
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
        ];
    }

    // Relacionamento com o usuário que criou o produto
    public function usuario()
    {
        return $this->belongsTo(User::class, 'criado_por');
    }
}
