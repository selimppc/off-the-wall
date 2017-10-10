<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialIconTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_icon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 32)->nullable();
            $table->string('slug', 128)->unique();
            $table->string('link', 256)->nullable();
            $table->string('icon', 256)->nullable();
            $table->enum('status',array(
                'active',
                'inactive'
            ))->nullable();

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
        Schema::drop('social_icon');
    }
}
