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

		$this->call('ProjectsTableSeeder');
		$this->call('TasksTableSeeder');
		//$this->command->info('User table seeded.');
	}

}