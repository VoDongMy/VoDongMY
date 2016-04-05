<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_blogs_data', function (Blueprint $table) {
            $table->increments('id')->unsigned();;
            $table->integer('category_blogs_id')->unsigned();;
            $table->foreign('category_blogs_id')->references('id')->on('category_blogs');
            $table->char('language_code');
            $table->text('category_alias');
            $table->text('category_name');
            $table->text('category_content');
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
        Schema::drop('category_blogs_data');
    }
}
