<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_id',  // FK do cliente
        'data_pedido',
    ];

    // Relacionamento com Cliente (Um pedido pertence a um cliente)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacionamento muitos-para-muitos com Produtos
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'pedido_produto')
                    ->withPivot('quantidade');  // Incluindo a coluna 'quantidade' da tabela pivot
    }
}
