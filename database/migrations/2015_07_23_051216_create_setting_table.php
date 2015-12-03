<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo');
            $table->string('name');
            $table->string('address');
            $table->string('email_1');
            $table->string('email_2');
            $table->string('email_3');
            $table->string('phone_1', 50);
            $table->string('phone_2', 50);
            $table->string('phone_3', 50);
            $table->string('skype_1', 50);
            $table->string('skype_2', 50);
            $table->string('skype_3', 50);
            $table->string('yahoo_1', 50);
            $table->string('yahoo_2', 50);
            $table->string('yahoo_3', 50);
            $table->string('short_description');
            $table->text('description');
            $table->text('contact');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->string('meta_description');
            $table->text('js_codes');
            $table->string('facebook');
            $table->string('googleplus');
            $table->string('twitter');
            $table->string('linkin');
            $table->string('youtube');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Settings');
    }
}
