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
    Schema::create('pedido_produto', function (Blueprint $table) {
        $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');  // Chave estrangeira para pedidos
        $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');  // Chave estrangeira para produtos
        $table->integer('quantidade');  // Quantidade do produto no pedido
        $table->primary(['pedido_id', 'produto_id']);  // Chave primária composta
    });
}

public function down()
{
    Schema::dropIfExists('pedido_produto');
}

};
