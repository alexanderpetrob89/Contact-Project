<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_people', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peopleId')->unsigned();
            $table->integer('tagId')->unsigned();
            $table->foreign('peopleId')->references('id')->on('people')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tagId')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('tag_people');
    }
}
