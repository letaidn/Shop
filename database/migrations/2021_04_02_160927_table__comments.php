<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Comments',function(Blueprint $table){
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('ID')->on('Products');
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('ID')->on('Users');
            $table->text('Comment');
            
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
        Schema::dropIfExists('Comments');
    }
}
