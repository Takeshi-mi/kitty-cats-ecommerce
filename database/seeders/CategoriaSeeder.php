<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::create(['nome' => 'Almofadas']);
        Categoria::create(['nome' => 'Canecas']);
        Categoria::create(['nome' => 'Pelúcias']);
    }
}
