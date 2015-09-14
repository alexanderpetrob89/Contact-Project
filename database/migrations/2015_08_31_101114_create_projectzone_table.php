<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectzoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectzone', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projectId');
            $table->string('ZoneName');
            $table->integer('projectZoneTypeId');
            $table->integer('areaWidth');
            $table->integer('areaLength');
            $table->integer('areaHeight');
            $table->integer('areaSquareFoot');
            $table->integer('AreaUnitId');
            $table->integer('freshAirVelocity');
            $table->integer('freshAirVelocityUnitId');
            $table->integer('exhastAirVelocity');
            $table->integer('exhastAirVelocityUnitId');
            $table->integer('freshAir');
            $table->integer('ductWidth');
            $table->integer('ductHeight');
            $table->integer('ductAirVelocity');
            $table->integer('OutdoorTemp');
            $table->integer('OutdoorTempUnitId');
            $table->integer('TargetTemp');
            $table->integer('TargetTempUnitId');
            $table->longText('note');
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
        Schema::drop('projectzone');
    }
}
