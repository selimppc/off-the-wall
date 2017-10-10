<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResetPasswordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reset_password', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->dateTime('reset_password_time');
            $table->dateTime('reset_password_expire');
            $table->string('reset_password_token');
            $table->tinyInteger('status', false, 1);
            $table->integer('created_by', false);
            $table->integer('updated_by', false);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user_reset_password', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_reset_password');
    }
}
