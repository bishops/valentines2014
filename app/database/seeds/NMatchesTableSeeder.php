<?php

class NMatchesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('matches')->truncate();

		$matches = array(
			array(
				'user_id_1'=>2,
				'user_id_2'=>10,
				'match_score'=>.5
			),
			array(
				'user_id_1'=>2,
				'user_id_2'=>3,
				'match_score'=>.6
			),
			array(
				'user_id_1'=>5,
				'user_id_2'=>2,
				'match_score'=>.76
			),
			array(
				'user_id_1'=>2,
				'user_id_2'=>8,
				'match_score'=>.9
			),
			array(
				'user_id_1'=>9,
				'user_id_2'=>2,
				'match_score'=>.3
			),	
			//
			array(
				'user_id_1'=>76,
				'user_id_2'=>2,
				'match_score'=>.3
			),
			array(
				'user_id_1'=>23,
				'user_id_2'=>2,
				'match_score'=>.96
			),
			array(
				'user_id_1'=>14,
				'user_id_2'=>2,
				'match_score'=>.1
			),
			array(
				'user_id_1'=>39,
				'user_id_2'=>2,
				'match_score'=>.2
			),

		);
		// $table->integer('user_id_1');
		// $table->integer('user_id_2');
		// $table->float('match_score');
		// Uncomment the below to run the seeder
		// DB::table('matches')->insert($matches);
	}
}
