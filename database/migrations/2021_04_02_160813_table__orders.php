<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Orders',function(Blueprint $table){
            $table->BigIncrements('ID');
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('ID')->on('Users')->onDelete('cascade');
            $table->tinyInteger('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('Orders');
    }
}
