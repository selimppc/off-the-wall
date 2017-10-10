<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 64)->nullable();
            $table->string('last_name', 64)->nullable();
            $table->string('twitter', 64)->nullable();
            $table->string('facebook', 64)->nullable();
            $table->string('google_plus', 64)->nullable();
            $table->string('linkedin', 64)->nullable();
            $table->string('image', 256)->nullable();
            $table->string('slug', 128)->unique();
            $table->string('email', 64)->nullable();
            $table->string('phone', 64)->nullable();
            $table->string('designation', 64)->nullable();
            $table->text('responsibility')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('team');
    }
}
