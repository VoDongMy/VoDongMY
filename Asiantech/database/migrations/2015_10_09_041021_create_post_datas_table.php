<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_datas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');  
            $table->char('language_code');
            $table->text('post_alias');
            $table->text('post_title');
            $table->text('post_descriptions');
            $table->text('post_contents');
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
        Schema::drop('post_datas');
    }
}
