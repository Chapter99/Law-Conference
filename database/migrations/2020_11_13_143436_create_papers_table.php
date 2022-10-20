<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title', 512);
            $table->string('authors', 255);
            $table->string('present', 8);
            $table->tinyInteger('topic');
            $table->tinyInteger('publish');
            $table->string('abstract_word', 64);
            $table->string('abstract_pdf', 64);
            $table->tinyInteger('paper_status');
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
        Schema::dropIfExists('papers');
    }
}
