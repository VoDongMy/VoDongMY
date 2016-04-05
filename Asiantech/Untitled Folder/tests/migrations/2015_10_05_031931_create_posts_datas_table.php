<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postsdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('languages_id');
            $table->string('post_title');
            $table->string('post_alias');
            $table->text('post_description');
            $table->text('post_content');
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->tinyInteger('is_active');
            $table->integer('order');
            $table->char('post_author');
            $table->dateTime('post_date');
            $table->text('properties');
            $table->timestamps();
        });
    }

   
    public function down()
    {   
        Schema::drop('postsdatas');
        Schema::drop('posts');
    }
}
