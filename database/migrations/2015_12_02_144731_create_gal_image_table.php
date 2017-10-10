<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gal_image', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cat_gallery_id')->nullable();
            $table->string('name', 64)->nullable();
            $table->string('image', 256)->nullable();
            $table->string('thumbnail', 256)->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->string('slug')->unique();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // Schema::table('gal_image', function($table) {
        //     $table->foreign('cat_gallery_id')->references('id')->on('cat_gallery');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gal_image');
    }
}
