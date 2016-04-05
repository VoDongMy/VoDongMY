<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('first_name')->unique();
            $table->string('last_name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('sex');
            $table->timestamp('date_of_birth')->nullable();
            $table->tinyInteger('is_active');
            $table->string('remember_token');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->tinyInteger('is_supper');
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
        Schema::drop('admin_users');
    }
}
