<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('OrderDetails',function(Blueprint $table){
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('ID')->on('Products')->onDelete('cascade');
            $table->unsignedBigInteger('OrderID');
            $table->foreign('OrderID')->references('ID')->on('Orders')->onDelete('cascade');
            $table->integer('Quantity');
            
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
        //
        Schema::dropIfExists('OrderDetails');
    }
}
