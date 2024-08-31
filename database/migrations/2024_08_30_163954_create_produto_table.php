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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->string('url_imagem')->default('')->nullable(); // para adicionar a imagem 
            $table->decimal('preco', 8, 2);
            $table->foreignId('criado_por')->constrained('users')->onDelete('cascade'); // Relacionado ao admin (user)
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); // Relacionado a categoria
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

