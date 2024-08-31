<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos'; // Define a tabela associada à model

    protected $fillable = [
        'user_id', 'valor_total', // Atributos permitidos para preenchimento em massa
    ];

    // Relacionamento com o cliente (usuário) que fez o pedido
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento muitos-para-muitos com a tabela 'produtos' através da tabela pivot 'pedido_produto'
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'pedido_produto')
                    ->withPivot('quantidade') // Inclui a quantidade de produtos na relação
                    ->withTimestamps(); // Inclui as colunas de timestamps na tabela pivot
    }
}
