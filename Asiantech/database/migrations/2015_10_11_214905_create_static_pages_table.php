<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('static_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_active');
            $table->integer('order');
            $table->text('feauture_image');
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
        Schema::drop('static_pages');
    }
}
