<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function(Blueprint $tb){
         $tb->increments('id');
         $tb->string('image',100);
         $tb->string('name',100);
         $tb->string('nickname',200);
         $tb->string('email',100);
         $tb->string('password',64);
         $tb->string('address',200);
         $tb->string('phone',100);
         $tb->tinyInteger('block')->default(1);
         $tb->tinyInteger('rule')->default(0);
         $tb->rememberToken();
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
		Schema::drop('users');
	}

}
