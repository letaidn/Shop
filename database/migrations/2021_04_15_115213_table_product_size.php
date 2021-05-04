<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableProductSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Product_size', function (Blueprint $table) {
            $table->bigIncrements("ID");
            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('ID')->on('Products')->onDelete('cascade');
            $table->unsignedTinyInteger('SizeID');
            $table->foreign('SizeID')->references('ID')->on('Sizes')->onDelete('cascade');
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
        Schema::dropIfExists('Product_size');
    }
}
