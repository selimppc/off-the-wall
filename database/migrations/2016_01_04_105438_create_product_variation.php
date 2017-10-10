<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('sell_quqntity')->nullable();
            $table->string('stock_balance')->nullable();
            $table->string('sell_rate')->nullable();
            $table->string('cost_proce')->nullable();
            $table->enum('status', array(
                'active','inactive'
            ));
            
            
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);

            $table->timestamps();
        });

        Schema::table('product_variation', function($table) {
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_variation');
    }
}
