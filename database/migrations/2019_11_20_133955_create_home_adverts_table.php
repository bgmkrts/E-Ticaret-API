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
            $table->integer('adverts_id');
            $table->integer('squareMeters');
            $table->integer('room_counts_id');
            $table->integer('buildingAge');
            $table->boolean('isItBalcony');
            $table->integer('floorLocation');
            $table->integer('countFloor');
            $table->integer('warming_types_id');
            $table->integer('countBathroom');
            $table->boolean('isItFurnished');
            $table->boolean('inTheSites');
            $table->integer('dues');
            $table->integer('deposit');
            $table->integer('facades_id');
            $table->boolean('isTheElevator');
            $table->boolean('isTheParking');
            $table->integer('housing_types_id');
            $table->string('usingStatus');

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
