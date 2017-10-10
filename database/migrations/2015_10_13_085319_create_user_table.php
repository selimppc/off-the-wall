<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('email', 64)->unique();
            $table->string('password', 64)->nullable();
            $table->text('address')->nullable();
            $table->string('phone_number',16)->nullable();
            $table->string('state',32)->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('image',128)->nullable();
            $table->enum('type', array(
                'user','admin'
            ));
            $table->enum('status', array(
                '', 'invited','active','inactive'
            ));
            $table->rememberToken();
            $table->timestamps();
        });
        /*Schema::table('user', function($table) {
            $table->foreign('country_id')->references('id')->on('country');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
