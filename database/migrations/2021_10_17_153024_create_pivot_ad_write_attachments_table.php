<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotAdWriteAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_ad_write_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('body');
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id')->on('ads')->references('id')->cascadeOnDelete();
            $table->unsignedBigInteger('ad_write_attachment_id');
            $table->foreign('ad_write_attachment_id')->on('ad_write_attachments')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('pivot_ad_write_attachments');
    }
}
