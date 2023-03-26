<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id')
                ->references('id')->on('productos');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')
                ->references('id')->on('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_categorias');
    }
}
