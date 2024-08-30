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
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();  // Chave primária
        $table->date('data_pedido');  // Data do pedido
        $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');  // Chave estrangeira para clientes
        $table->timestamps();  // Colunas de timestamps
    });
}

public function down()
{
    Schema::dropIfExists('pedidos');
}

};
