<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPageDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_page_datas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('static_page_id')->unsigned();
            $table->foreign('static_page_id')->references('id')->on('static_pages');  
            $table->char('language_code');
            $table->text('page_alias');
            $table->text('page_title');
            $table->text('page_contents');
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
        Schema::drop('static_page_datas');
    }
}
