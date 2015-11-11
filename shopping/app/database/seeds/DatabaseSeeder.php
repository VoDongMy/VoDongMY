<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('ManufactureSeeder');
		$this->call('TagSeeder');
		$this->call('ProductSeeder');
		$this->call('UserSeeder');
		$this->call('ProductInfoSeeder');
		$this->call('ProductimageSeeder');
	}
}
