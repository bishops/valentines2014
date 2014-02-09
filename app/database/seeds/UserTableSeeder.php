<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$all = array();
		ini_set("auto_detect_line_endings", true);
		$string = file_get_contents(__DIR__.'/../../custom/USstudents.csv');
		$line_array = explode("\n", $string);
		foreach ($line_array as $key => $value) {
			$param_array = explode(",", $value);
			// return var_dump($param_array,true);
			$u = array();
			$u['grad_year']  = intval($param_array[6]);
			$u['first_name'] = empty($param_array[3]) ? $param_array[2] : $param_array[3];
			$u['last_name']  = $param_array[4];
			$u['email']      = $param_array[5];
			$u['gender']     = rand(0,1);
			array_push($all, $u);
		}

		DB::table('users')->insert($all);
	}

}
