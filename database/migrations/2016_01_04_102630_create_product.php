<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_category_id')->nullable();
            $table->unsignedInteger('product_group_id')->nullable();
            $table->unsignedInteger('product_subgroup_id')->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->text('long_description');
            $table->enum('status', array(
                'active','inactive'
            ));
            $table->string('sku')->nullable();
            $table->enum('class',array(
                'Product','Serice','Soft copy'
            ));
            $table->string('group')->nullable();
            $table->string('sell_rate')->nullable();
            $table->string('cost_price')->nullable();
            $table->string('sell_unit')->nullable();
            $table->string('sell_unit_quantity')->nullable();
            $table->string('stock_unit')->nullable();
            $table->string('stock_unit_quantity')->nullable();
            $table->enum('is_price_vary',array(
                    'no','yes'
                ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);

            $table->timestamps();
        });

        // Schema::table('product', function($table) {
        //     $table->foreign('product_category_id')->references('id')->on('product_category');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }
}
