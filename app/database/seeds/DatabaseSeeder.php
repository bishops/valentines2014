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

		$this->call('UserTableSeeder');
		$this->call('QuestionTableSeeder');
		$this->call('QuestionResponseTableSeeder');


		$this->call('NMatchesTableSeeder');
		$this->call('LogsTableSeeder');
	}

}
