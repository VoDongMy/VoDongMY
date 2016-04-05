<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();
        DB::table('users')->insert([
            'id'            => 1,
            'name'          => 'admin',
            'email'          => 'admin@admin.io',
            'password'          => Hash::make('admin'),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('role_user')->truncate();
        DB::table('role_user')->insert([
                'id' => 1,
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
        ]);

    }
}
