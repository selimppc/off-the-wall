<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 256)->nullable();
            $table->string('slug', 128)->unique();
            $table->unsignedInteger('blog_cat_id')->nullable();
            $table->text('desc')->nullable();
            $table->string('meta_title', 256)->nullable();
            $table->string('meta_keyword', 256)->nullable();
            $table->text('meta_desc')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('blog_item', function($table) {
            $table->foreign('blog_cat_id')->references('id')->on('blog_cat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog_item');
    }
}
