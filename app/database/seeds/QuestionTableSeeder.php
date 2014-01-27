<?php

class QuestionTableSeeder extends Seeder {

        public function run()
        {
                // Uncomment the below to wipe the table clean before populating
                DB::table('questions')->truncate();

                $questions = array(
                	array(
                		'prompt'=>'What is your favorite color?',
                		'answera'=>'red',
                		'answerb'=>'green',
                		'answerc'=>'blue',
                		'answerd'=>'orange',
                	),
                  	array(
                		'prompt'=>'What is your favorite breakfast food?',
                		'answera'=>'cereal',
                		'answerb'=>'oatmeal',
                		'answerc'=>'oranges',
                		'answerd'=>'pancakes',
                	),

                );

                // Uncomment the below to run the seeder
                DB::table('questions')->insert($questions);
        }

}
