<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('notesTypeId');
            $table->integer('notesStatusId');
            $table->integer('notesCommTypeId');
            $table->integer('notesAssignId');
            $table->integer('noteTypeDetailId');
            $table->longText('notes');
            $table->integer('peopleId');
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
        Schema::drop('note');
    }
}
