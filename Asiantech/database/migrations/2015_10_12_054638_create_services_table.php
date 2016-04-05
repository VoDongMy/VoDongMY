<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_active');
            $table->integer('order');
            $table->text('feauture_image');
            $table->text('service_url');
            $table->text('app_url_ios');
            $table->text('app_url_android');
            $table->text('app_url_windows');
            $table->text('gallery');
            $table->text('author_id');
            $table->text('properties');
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
        Schema::drop('services');
    }
}
