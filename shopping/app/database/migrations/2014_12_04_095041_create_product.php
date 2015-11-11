<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products',function(Blueprint $tb){
         $tb->increments('id');
         $tb->string('name',255);
         $tb->string('image',255);
         $tb->string('image_small',255);
         $tb->text('description');
         $tb->integer('quantity')->unsigned();
         $tb->integer('price');
         $tb->tinyInteger('price_sale');
         $tb->tinyInteger('price_bestsaller');
         $tb->tinyInteger('rate');
         $tb->integer('tag_id')->unsigned();
         $tb->integer('manufacture_id')->unsigned();
         $tb->string('slug',255);
         $tb->integer('viewed')->unsigned();
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
	public function down(){
      Schema::drop('products');
	}

}
