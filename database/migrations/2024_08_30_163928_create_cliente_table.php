<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();  // Chave primária
            $table->string('nome');
            $table->string('email')->unique();  // Email único
            $table->timestamps();  // Colunas de timestamps
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
    
};
