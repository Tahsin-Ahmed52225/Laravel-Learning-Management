<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            $table->string("Course_name");
            $table->string("Course_code");
            $table->unsignedBigInteger('Course_teacher');
            $table->string("Course_key")->unique();
            $table->string("Course_resource_link")->nullable();
            $table->timestamps();


            $table->foreign('Course_teacher')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
