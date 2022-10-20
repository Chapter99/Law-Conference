<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->tinyInteger('choice');
            $table->string('vehicle');
            $table->tinyInteger('num_car');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('num_person');
            $table->tinyInteger('hotel');
            $table->boolean('day11');
            $table->tinyInteger('airport_time');
            $table->boolean('day12');
            $table->boolean('party');
            $table->boolean('day13');
            $table->tinyInteger('route13');
            $table->boolean('day14');
            $table->tinyInteger('depart');
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
        Schema::dropIfExists('travels');
    }
}
