<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Noticia extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = [
        'titulo',
        'descricao',
        'url',
    ];

    //Query Scopes

    public function scopeFilter(Builder $query, array $filters)
    {
        if($title = $filters['title'] ?? null) {
            $query->where('titulo', 'like', '%' . $title . '%');
        }

        if($description = $filters['description'] ?? false) {
            $query->where('descricao', 'like', '%' . $description . '%');
        }
    }

    public function storeArquivo($arquivo)
    {
        if($arquivo) {
            $path = $arquivo->store('arquivos', 'public');//caminho onde o arquivo será salvo
            $this->url = Storage::url($path); //caminho completo para acessar o arquivo
            $this->save();//salva o caminho no banco de dados
        }
    }

    //Adicione os campos que você quer indexar  
    public function toSearchableArray()
    {
    return [
        'id' => $this->id,
        'titulo' => $this->titulo,
        'descricao' => $this->descricao,
    ];
}
}