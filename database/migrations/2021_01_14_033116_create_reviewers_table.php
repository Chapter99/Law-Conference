<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 20);
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->tinyInteger('type');
            $table->string('university', 50);
            $table->tinyInteger('ss1');
            $table->tinyInteger('ss2');
            $table->tinyInteger('ss3');
            $table->string('email', 50);
            $table->string('telephone', 20);
            $table->string('password', 30);
            $table->tinyInteger('invite');
            $table->tinyInteger('invite_full');
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
        Schema::dropIfExists('reviewers');
    }
}
