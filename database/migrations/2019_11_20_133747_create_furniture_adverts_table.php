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
            $table->integer('cities_id');
            $table->string('furnitureName');
            $table->integer('advert_id');
            $table->integer('statu_id');
            $table->integer('wage_id');
            $table->integer('users_id');
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
