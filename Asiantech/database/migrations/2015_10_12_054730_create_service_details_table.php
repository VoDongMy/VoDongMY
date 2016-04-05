<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_details', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');  
            $table->char('language_code');
            $table->text('service_name');
            $table->text('service_alias');
            $table->text('description');
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
        Schema::drop('service_details');
    }
}
