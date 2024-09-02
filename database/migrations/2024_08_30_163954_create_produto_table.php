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
        $imagemDefault = '/img/cats/loading-catloading.gif';
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->string('url_imagem')->default('/img/cats/loading-catloading.gif')->nullable(); // para adicionar a imagem 
            $table->decimal('preco', 8, 2);
            $table->foreignId('criado_por')->constrained('users')->onDelete('cascade'); // Relacionado ao admin (user)
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); // Relacionado a categoria
            $table->timestamps();
        });

        DB::table('produtos')->insert([
            [
                'nome' => 'Almofada de gato preto', 
                'descricao' => 'Uma almofada confortável com estampa de um gato preto adorável.', 
                'url_imagem' => '/img/cats/almofada-desenho.png', 
                'preco' => '40.00', 
                'criado_por' => 1, 
                'categoria_id' => 1 
            ],
            [
                'nome' => 'Pelúcia de gato siamês', 
                'descricao' => 'Pelúcia macia e fofa de um gato siamês, perfeita para abraçar.', 
                'url_imagem' => '/img/cats/pelucia-siamesa.jpeg', 
                'preco' => '29.90', 
                'criado_por' => 1, 
                'categoria_id' => 3 
            ],
            [
                'nome' => 'Caneca com Gato Dormindo', 
                'descricao' => 'Caneca de cerâmica com um gatinho fofo dormindo. Uma ótima opção para o seu café da manhã.', 
                'url_imagem' => $imagemDefault ,
                'preco' => '24.90', 
                'criado_por' => 1, 
                'categoria_id' => 2 
            ],
            [
                'nome' => 'Camiseta Gato Astronauta', 
                'descricao' => 'Camiseta divertida com um gato usando um capacete de astronauta. Ideal para quem ama gatos e espaço!', 
                'url_imagem' => $imagemDefault, 
                'preco' => '39.90', 
                'criado_por' => 1, 
                'categoria_id' => 4 
            ],
            [
                'nome' => 'Almofada Gatinha com Laço', 
                'descricao' => 'Almofada fofa com estampa de uma gatinha usando um laço rosa. Perfeita para decorar o quarto.', 
                'url_imagem' => $imagemDefault, 
                'preco' => '34.90', 
                'criado_por' => 1, 
                'categoria_id' => 1 
            ],
            [
                'nome' => 'Caneca Gato com óculos', 
                'descricao' => 'Caneca de cerâmica com um gatinho usando óculos. Uma ótima opção para quem gosta de um toque de humor.', 
                'url_imagem' => $imagemDefault, 
                'preco' => '19.90', 
                'criado_por' => 1, 
                'categoria_id' => 2 
            ],
            [
                'nome' => 'Pelúcia Gato Branco e Preto', 
                'descricao' => 'Pelúcia macia de um gato branco e preto, com detalhes realistas.', 
                'url_imagem' => $imagemDefault, 
                'preco' => '49.90', 
                'criado_por' => 1, 
                'categoria_id' => 3 
            ],
            [
                'nome' => 'Camiseta Gato Malhado', 
                'descricao' => 'Camiseta com estampa de um gato malhado, perfeita para os amantes de gatos.', 
                'url_imagem' => $imagemDefault, 
                'preco' => '29.90', 
                'criado_por' => 1, 
                'categoria_id' => 4 
            ],
            [
                'nome' => 'Almofada Gato Escondido', 
                'descricao' => 'Almofada divertida com um gatinho se escondendo em um presente. Perfeita para quem gosta de surpresas.', 
                'url_imagem' => $imagemDefault, 
                'preco' => '39.90', 
                'criado_por' => 1, 
                'categoria_id' => 1 
            ],
            [
                'nome' => 'Caneca Gato de Coleção', 
                'descricao' => 'Caneca de cerâmica especial com um gato de coleção. Uma ótima opção para colecionadores.', 
                'url_imagem' => $imagemDefault, 
                'preco' => '34.90', 
                'criado_por' => 1, 
                'categoria_id' => 2 
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

