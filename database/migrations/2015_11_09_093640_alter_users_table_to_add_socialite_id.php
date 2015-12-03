<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableToAddSocialiteId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('facebook_id', 50)->unique();
            $table->string('github_id', 50)->unique();
            $table->string('google_id', 50)->unique();
            $table->string('twitter_id', 50)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('facebook_id');
            $table->dropColumn('github_id');
            $table->dropColumn('google_id');
            $table->dropColumn('twitter_id');
        });
    }
}
