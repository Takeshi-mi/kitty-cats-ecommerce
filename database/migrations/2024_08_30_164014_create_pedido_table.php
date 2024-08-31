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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); // Chave primária da tabela 'pedidos'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para o cliente que fez o pedido
            $table->decimal('valor_total', 8, 2); // Valor total do pedido com 8 dígitos, 2 decimais
            $table->timestamps(); // Campos 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos'); // Deleta a tabela 'pedidos' se necessário
    }
};
