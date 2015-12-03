<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function($table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->integer('parent_id')->default(0);
            $table->string('path', 255);
            $table->tinyInteger('level');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('active');
            $table->integer('position')->default(0);
            $table->string('icon', 255);
            $table->string('background', 50);
            $table->string('description', 255);
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
        Schema::drop('categories');
    }
}
