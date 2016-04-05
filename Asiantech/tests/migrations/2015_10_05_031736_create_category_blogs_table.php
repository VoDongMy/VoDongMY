<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_blogs_data', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('category_blogs_id', 11);
            $table->integer('languages_id', 11);
            $table->string('category_blogs', 255);
            $table->string('category_name', 255);
            $table->text('category_content');
            $table->timestamps();
        });

        Schema::create('category_blogs', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->integer('parent_id', 11);
            $table->tinyInteger('is_active', 1);
            $table->integer('order', 11);
            $table->string('user_created', 50);
            $table->dateTime('date_created');
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
        Schema::drop('category_blogs');
        Schema::drop('category_blogs_data');


    }
}
