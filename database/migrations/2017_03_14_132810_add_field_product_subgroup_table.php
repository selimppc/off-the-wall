<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldProductSubgroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('product_subgroup', function (Blueprint $table) {
            
            $table->string('meta_title', 256)->nullable();
			$table->string('meta_keyword', 256)->nullable();
            $table->text('meta_desc')->nullable();
			$table->text('short_desc')->nullable();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
