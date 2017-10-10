<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_subgroup', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_group_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->enum('status', array(
                'active','inactive'
            ));
            
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);

            $table->timestamps();
        });

        Schema::table('product_subgroup', function($table) {
            $table->foreign('product_group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
