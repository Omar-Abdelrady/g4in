<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('advertiser_name');
            $table->longText('description');
            $table->longText('short_description')->nullable();
            $table->string('price');
            $table->string('space');
            $table->longText('address');
            $table->string('phone');
            $table->string('second_phone');
            $table->text('meridians')->nullable();
            $table->text('latitudes')->nullable();
            $table->integer('ad_status')->default('0')->comment('0:pending, 1:active, 2:not active, 3:report');
            $table->integer('sale_or_rent')->comment('0:sale, 1:rent');
            $table->string('advertiser_email');
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
        Schema::dropIfExists('ads');
    }
}
