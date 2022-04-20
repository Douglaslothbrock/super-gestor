<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutoFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // CRIANDO A TABELA FILIAIS
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 50);
            $table->timestamps();
        });

        //CRIANDO A TABELA PRODUTO_FILIAIS      
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        // REMOVENDO COLUNAS DA TABELA PRODUTOS
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn([
                'preco_venda',
                'estoque_maximo',
                'estoque_minimo'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // ADICIONANDO COLUNAS DA TABELA PRODUTOS
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        Schema::dropIfExists('produto_filiais');
        schema::dropIfExists('filiais');
    }
}
