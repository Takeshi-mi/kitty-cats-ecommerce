<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'admin_id',  // FK do Admin que criou o produto
    ];

    // Relacionamento muitos-para-muitos com Pedidos
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_produto')
                    ->withPivot('quantidade');
    }

    // Relacionamento com Admin (Um Produto pertence a um Admin)
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}

