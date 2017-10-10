<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('menu_type_id')->nullable();
            $table->string('name', 64)->nullable();
            $table->string('slug')->nullable();
            $table->unique(['name', 'id']);
            $table->string('alias', 64)->nullable();
            $table->string('url', 256)->nullable();
            $table->enum('type',array(
                'url',
                'ext'
            ))->nullable();
            $table->enum('status',array(
                'active',
                'inactive'
            ))->nullable();
            $table->integer('parent',false,11)->nullable();
            $table->enum('ext_name',array(
                'skill',
                'team',
                'article',
                'social_icon',
                'blog',
                'gallery',
                'slider'
            ))->nullable();
            $table->integer('order',false,2)->nullable();
            $table->text('desc')->nullable();

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
        Schema::drop('menu');
    }
}
