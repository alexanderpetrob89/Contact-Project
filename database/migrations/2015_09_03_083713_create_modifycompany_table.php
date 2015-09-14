<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifycompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function($t) {
            $t->integer('mainPeopleId')->nullable();
            $t->longText('website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function($t) {
            $t->dropColumn('mainPeopleId');
            $t->dropColumn('website');
        });
    }
}
