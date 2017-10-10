<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 32)->nullable();
            $table->string('slug', 128)->unique();
            $table->text('content')->nullable();
            $table->integer('order',false,2);
            $table->string('position', 16)->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->enum('widget_name', ['Skill', 'Team', 'Article', 'Social Icon', 'Blog', 'Gallery', 'Slider'])->nullable();
            $table->enum('showtitle', ['yes', 'no'])->nullable();

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
        Schema::drop('widget');
    }
}
