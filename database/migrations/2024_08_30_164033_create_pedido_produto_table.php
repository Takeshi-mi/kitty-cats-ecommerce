<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedido_produto', function (Blueprint $table) {
            $table->id(); // Chave primária da tabela 'pedido_produto'
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade'); // Chave estrangeira para o pedido
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade'); // Chave estrangeira para o produto
            $table->integer('quantidade'); // Quantidade de produtos no pedido
            $table->timestamps(); // Campos 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_produto'); // Deleta a tabela 'pedido_produto' se necessário
    }
};

