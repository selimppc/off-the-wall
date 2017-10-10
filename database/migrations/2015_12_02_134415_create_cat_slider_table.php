<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_slider', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 64)->nullable();
            $table->string('slug')->unique();
            $table->text('desc')->nullable();
            $table->string('url', 256)->nullable();
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
        Schema::drop('cat_slider');
    }
}
