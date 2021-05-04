<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Products',function(Blueprint $table){
            $table->bigIncrements('ID');
            $table->string('Name');
            $table->double('Price');
            $table->text('Description');
            $table->integer('Stock');
            $table->integer('Discount')->nullable();
            $table->unsignedTinyInteger('CategoryID');
            $table->foreign('CategoryID')->references('ID')->on('Categories')->onDelete('cascade');
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
        Schema::dropIfExists('Products');
    }
}
