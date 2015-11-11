<?php
/**
 * Created by PhpStorm.
 * User: Shinta
 * Date: 12/6/2014
 * Time: 9:14 AM
 */
class UserSeeder extends Seeder{
   public function run(){
      User::truncate();
      User::create(array(
         'name' => 'Admin',
         'email' => 'Admin',
         'image' => 'lib/img/avatar5.png',
         'password' => Hash::make('123456'),
         'nickname' => 'admin',
         'rule' => 2
      ));
   }
}