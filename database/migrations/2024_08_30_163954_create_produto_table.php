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
    Schema::create('produtos', function (Blueprint $table) {
        $table->id();  // Chave primária
        $table->string('nome');
        $table->decimal('preco', 10, 2);  // Preço com até 10 dígitos e 2 casas decimais
        $table->text('descricao')->nullable();  // Descrição opcional
         // Chave estrangeira referenciando o Admin que criou o produto
        $table->unsignedBigInteger('admin_id');
        $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        
        $table->timestamps();  // Colunas de timestamps
    });
}

public function down()
{
    Schema::dropIfExists('produtos');
}

};
