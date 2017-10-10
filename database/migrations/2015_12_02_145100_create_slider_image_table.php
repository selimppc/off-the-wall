<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_image', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cat_slider_id')->nullable();
            $table->string('name', 64)->nullable();
            $table->string('slug')->unique();
            $table->string('image', 256)->nullable();
            $table->string('thumbnail', 256)->nullable();
            $table->string('url', 256)->nullable();
            $table->enum('group', [
                '',
                'group_1'
            ])->nullable();
            $table->enum('status', [
                'active',
                'inactive'
            ])->nullable();

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('slider_image', function($table) {
            $table->foreign('cat_slider_id')->references('id')->on('cat_slider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('slider_image');
    }
}
