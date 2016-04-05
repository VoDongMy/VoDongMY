<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language_name');
            $table->string('code');
            $table->tinyInteger('is_default');
            $table->integer('lack');
            $table->integer('total');
        });
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('languages');
            $table->tinyInteger('is_active');
            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_languages');
        Schema::drop('languages');
    }
}
