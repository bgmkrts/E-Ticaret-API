<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFurnitureAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furniture_adverts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product');
            $table->string('model');
            $table->string('brand');
            $table->boolean('status');
            $table->integer('adverts_id');
            $table->boolean('isItGuarantee');
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
        Schema::dropIfExists('furniture_adverts');
    }
}
