<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_adverts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cities_id');
            $table->integer('status_id');
            $table->string('explanation');
            $table->integer('wages_id');
            $table->integer('users_id');
            $table->integer('adverts_id');
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
        Schema::dropIfExists('home_adverts');
    }
}
