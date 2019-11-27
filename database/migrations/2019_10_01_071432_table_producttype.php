<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableProducttype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProductType',function(Blueprint $table){
            $table->Increments('Id');
            $table->string('Name')->nullable();
            $table->text('Content')->nullable();
            $table->string('Image')->nullable();
            $table->tinyinteger('Order')->nullable();
            $table->tinyinteger('Status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProductType');
    }
}
