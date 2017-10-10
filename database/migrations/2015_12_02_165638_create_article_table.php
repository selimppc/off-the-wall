<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 256)->nullable();
            $table->string('slug')->unique();
            $table->string('type', 64)->nullable();
            $table->text('desc')->nullable();
            $table->string('featured_image', 256)->nullable();
            $table->string('featured_image_2', 256)->nullable();
            $table->string('thumbnail', 256)->nullable();
            $table->string('thumbnail_2', 256)->nullable();
            $table->string('meta_title', 256)->nullable();
            $table->string('meta_keyword', 256)->nullable();
            $table->text('meta_desc')->nullable();
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
        Schema::drop('article');
    }
}
