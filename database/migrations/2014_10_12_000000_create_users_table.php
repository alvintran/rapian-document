<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('email')->unique();
        //     $table->string('password', 60);
        //     $table->string('name');
        //     $table->string('nickname');
        //     $table->string('avatar');
        //     $table->string('phone');
        //     $table->string('address');
        //     $table->tinyInteger('gender');
        //     $table->tinyInteger('active')->index();
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
