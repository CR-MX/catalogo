<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diseno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disenos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')
                ->references('id')->on('categorias');
            $table->integer('clave');
            $table->longText('imagen_ligera');
            $table->longText('imagen');
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
        Schema::dropIfExists('disenos');
    }
}
