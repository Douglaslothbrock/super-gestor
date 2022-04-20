<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // Adicionando Relacionamento a Tabela Produtos
        Schema::table('produtos', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // Adicionando Relacionamento a Tabela Produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Removendo Relacionamento a Tabela Produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            // Removendo a Fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign');

            // Removendo a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        // Removendo Relacionamento a Tabela Produtos
        Schema::table('produtos', function(Blueprint $table) {
            // Removendo a Fk
            $table->dropForeign('produtos_unidade_id_foreign');

            // Removendo a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
