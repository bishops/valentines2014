<?php

class QuestionResponseTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('question_response')->truncate();

		// $questionresponse = array(

		// );
		// $answers = array('a','b','c','d');
		// for ($i=3; $i < 20; $i++) { 
		// 	for ($j=1; $j <= 2; $j++) { 
		// 		$tarray = array();
		// 		$tarray['answer'] = $answers[rand(0,3)];
		// 		$tarray['user_id'] = $i;
		// 		$tarray['question_id'] = $j;
		// 		echo "i: ".$i." j: ".$j."\n";
		// 		array_push($questionresponse, $tarray);
		// 	}
		// }

		// var_dump($questionresponse);
		// Uncomment the below to run the seeder
		// DB::table('question_response')->insert($questionresponse);
	}

}
