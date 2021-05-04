<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Users',function(Blueprint $table){
            $table->bigIncrements('ID');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->date('Birthday')->nullable();
            $table->text('Address')->nullable();
            $table->string('Phone',11)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedTinyInteger('RoleID');
            $table->foreign('RoleID')->references('ID')->on('Roles')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('Users');
    }
}
