<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeline_details', function (Blueprint $table) {
            $table->increments('id')->unsigned();;
            $table->integer('timeline_id')->unsigned();;
            $table->foreign('timeline_id')->references('id')->on('timelines');
            $table->char('language_code');
            $table->text('content');
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
        Schema::drop('timeline_details');
    }
}
