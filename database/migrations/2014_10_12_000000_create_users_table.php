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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname',25);
            $table->string('lname',25);
            $table->string('username',100)->unique();;
            $table->string('email',255)->unique();
            $table->string('password',255);
            $table->string('profile_pic',255);
            $table->integer('num_post');
            $table->integer('num_like');
            $table->string('user_close',3);
            $table->text('frnd_array');

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
        Schema::drop('users');
    }
}
