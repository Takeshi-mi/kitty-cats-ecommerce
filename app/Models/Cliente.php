<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'endereco',
    ];

    // Relacionamento com pedidos (Um cliente tem muitos pedidos)
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
