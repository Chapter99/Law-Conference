<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title', 10);
            $table->string('academic', 10);
            $table->string('fname', 63);
            $table->string('lname', 63);
            $table->tinyInteger('register_type');
            $table->string('other', 31)->nullable();;
            $table->string('faculty', 63)->nullable();;
            $table->string('university', 63)->nullable();;
            $table->string('org', 127)->nullable();;
            $table->string('address', 255);
            $table->string('province', 63);
            $table->string('postcode', 7);
            $table->string('tel', 31);
            $table->tinyInteger('join_type');
            $table->tinyInteger('present');
            $table->tinyInteger('food');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('isAdmin')->nullable();
            $table->tinyInteger('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
