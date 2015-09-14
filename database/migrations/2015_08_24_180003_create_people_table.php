<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titleName')->nullable();
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->bigInteger('companyId')->nullable();
            $table->string('companyName')->nullable();
            $table->integer('defaultAddressId')->nullable();
            $table->integer('defaultBilladdressId')->nullable();
            $table->integer('defaultShipaddressId')->nullable();
            $table->integer('defaultWareaddressId')->nullable();
            $table->integer('industryId')->nullable();
            $table->integer('categoryId')->nullable();
            $table->integer('typeId')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('statusId')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('userId')->nullable();
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
        Schema::drop('people');
    }
}
