<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commment', function (Blueprint $table) {
            $table->id();
            $table->string("content");
            $table->unsignedBigInteger('Post_ID');
            $table->unsignedBigInteger('writter_ID');
            $table->timestamps();


            $table->foreign('writter_ID')->references('id')->on('users');
            $table->foreign('Post_ID')->references('id')->on('post');
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
