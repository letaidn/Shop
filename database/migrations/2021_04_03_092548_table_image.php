<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProductImages', function (Blueprint $table) {
            $table->bigIncrements("ID");
            $table->text('Name');
            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('ID')->on('Products')->onDelete('cascade');
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
        Schema::dropIfExists('ProductImages');
    }
}
