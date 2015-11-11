<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInfo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_infomations',function(Blueprint $tb){
         $tb->increments('id');
         $tb->string('name_product',255);
         $tb->text('value');
         $tb->integer('product_id')->unsigned();
         $tb->timestamps();
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
      Schema::drop('product_infomations');
	}

}
