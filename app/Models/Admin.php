<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Relacionamento um-para-muitos com Produtos (Um Admin pode criar muitos produtos)
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}

