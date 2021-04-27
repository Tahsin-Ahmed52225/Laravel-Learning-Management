<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string("content");
            $table->unsignedBigInteger('CourseID');
            $table->unsignedBigInteger('writter_ID');
            $table->timestamps();


            $table->foreign('writter_ID')->references('id')->on('users');
            $table->foreign('CourseID')->references('id')->on('class');
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
    }
}
