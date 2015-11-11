<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTag extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      Schema::create('tags', function(Blueprint $tb){
         $tb->increments('id');
         $tb->string('name',100);
         $tb->text('template');
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
	public function down(){
      Schema::drop('tags');
	}

}
