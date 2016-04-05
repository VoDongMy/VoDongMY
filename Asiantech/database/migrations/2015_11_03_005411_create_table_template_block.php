<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTemplateBlock extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('template_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->text('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('template_blocks');
    }
}
