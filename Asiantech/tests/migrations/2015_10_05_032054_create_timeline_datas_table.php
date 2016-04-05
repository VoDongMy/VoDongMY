<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelineDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeline_datas', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('timeline_id', 11);
            $table->integer('languages_id', 11);
            $table->text('category_content');
            $table->timestamps();
        });

         Schema::create('timeline', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->char('created_by', 50);
            $table->dateTime('date_created');
            $table->tinyInteger('is_active', 1);
            $table->integer('order', 11);
            $table->text('properties');
            $table->timestamps();
        });
    }

    public function down()
    {   
        Schema::drop('timeline_datas');
        Schema::drop('timeline');
    }
}
