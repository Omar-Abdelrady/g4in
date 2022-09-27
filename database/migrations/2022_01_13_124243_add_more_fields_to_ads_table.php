<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->string('ad_code')->index()->unique();
            $table->unsignedInteger('num_of_rooms')->nullable();
            $table->unsignedInteger('num_of_kitchens')->nullable();
            $table->unsignedInteger('num_of_toilets')->nullable();
            $table->unsignedInteger('num_of_floors')->nullable();
            $table->unsignedInteger('num_of_apartments')->nullable();
            $table->unsignedInteger('num_of_shops')->nullable();
            $table->unsignedInteger('block_num')->nullable();
            $table->unsignedInteger('place_num')->nullable();

            $table->string('advertiser_name')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('second_phone')->nullable()->change();
            $table->string('advertiser_email')->nullable()->change();
            $table->longText('description')->nullable()->change();
            $table->string('price')->nullable()->change();
            $table->string('space')->nullable()->change();
            $table->longText('address')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn('ad_code');
            $table->dropColumn('num_of_rooms');
            $table->dropColumn('num_of_kitchens');
            $table->dropColumn('num_of_toilets');
            $table->dropColumn('num_of_floors');
            $table->dropColumn('num_of_apartments');
            $table->dropColumn('num_of_shops');
            $table->dropColumn('block_num');
            $table->dropColumn('place_num');

            $table->string('advertiser_name')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->string('second_phone')->nullable(false)->change();
            $table->string('advertiser_email')->nullable(false)->change();
            $table->longText('description')->nullable(false)->change();
            $table->string('price')->nullable(false)->change();
            $table->string('space')->nullable(false)->change();
            $table->longText('address')->nullable(false)->change();

        });
    }
}
