<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product',function(Blueprint $table){
            $table->Increments('Id');
            $table->string('Name')->nullable();
            $table->text('Detail')->nullable();
            $table->float('Price',10)->nullable();
            $table->string('Image')->nullable();
            $table->float('PriceNew',10)->nullable();
            $table->datetime('Date')->nullable();
            $table->tinyinteger('Order')->nullable();
            $table->tinyinteger('Status')->nullable();
            $table->integer('GroupProduct_Id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Product');
    }
}
