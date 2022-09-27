<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('charts', function (Blueprint $table) {
            $table->dropColumn('chart');
            $table->string('photo')->nullable();
            $table->string('pdf')->nullable();
            $table->string('video')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('charts', function (Blueprint $table) {
            $table->string('chart');
            $table->dropColumn('photo');
            $table->dropColumn('pdf');
            $table->dropColumn('video');
            $table->dropColumn('description');
        });
    }
}
