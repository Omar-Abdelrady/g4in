<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotAdAttachedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_ad_attacheds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_attached_id');
            $table->unsignedBigInteger('ad_id');

            $table->foreign('ad_attached_id')->on('ad_attacheds')->references('id')->cascadeOnDelete();
            $table->foreign('ad_id')->on('ads')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('pivot_ad_attacheds');
    }
}
