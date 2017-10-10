<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->nullable();
            $table->string('slug', 128)->unique();
            $table->string('email', 64)->nullable();
            $table->string('phone', 16)->nullable();
            $table->text('content')->nullable();
            $table->string('project', 128)->nullable();
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
        Schema::drop('testimonial');
    }
}
