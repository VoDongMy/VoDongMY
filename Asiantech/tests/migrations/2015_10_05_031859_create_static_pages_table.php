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
        Schema::create('static_pages_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('static_page_id');
            $table->integer('languages_id');
            $table->string('page_title');
            $table->text('page_contents');
            $table->timestamps();
        });
        Schema::create('static_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('create_by');
            $table->dateTime('date_create');
            $table->tinyInteger('is_active');
            $table->integer('order');
            $table->text('propeties');
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
        Schema::drop('static_pages_data');
        Schema::drop('static_pages');
    }



}
