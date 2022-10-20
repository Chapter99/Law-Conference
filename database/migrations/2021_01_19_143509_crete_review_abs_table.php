<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreteReviewAbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_abs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paper_id');
            $table->integer('rev_id');
            $table->boolean('accept');
            $table->text('comments');
            $table->tinyInteger('result');
            $table->boolean('approve');
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
        //
    }
}
