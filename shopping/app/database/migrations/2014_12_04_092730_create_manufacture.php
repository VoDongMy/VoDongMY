<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacture extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      Schema::create('manufactures', function(Blueprint $tb){
         $tb->increments('id');
         $tb->string('name',100);
         $tb->string('logo',255);
         $tb->string('slug',100);
         $tb->tinyInteger('block');
         $tb->timestamps();
         $tb->engine = 'InnoDB';
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
      Schema::drop('manufactures');
	}

}
