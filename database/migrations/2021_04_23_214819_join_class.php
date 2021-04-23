<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JoinClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joinclass', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CourseID');
            $table->string("Course_Name");
            $table->unsignedBigInteger('Student_ID');
            $table->timestamps();


            $table->foreign('CourseID')->references('id')->on('class');
            $table->foreign('Student_ID')->references('id')->on('users');
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
