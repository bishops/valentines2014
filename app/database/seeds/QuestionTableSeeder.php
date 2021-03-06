<?php

class QuestionTableSeeder extends Seeder {

        public function run()
        {
                // Uncomment the below to wipe the table clean before populating
                DB::table('questions')->truncate();

                // $questions = array(
                // 	array(
                // 		'prompt'=>'What is your favorite color?',
                // 		'answera'=>'red',
                // 		'answerb'=>'green',
                // 		'answerc'=>'blue',
                // 		'answerd'=>'orange',
                // 	),
                //   	array(
                // 		'prompt'=>'What is your favorite breakfast food?',
                // 		'answera'=>'cereal',
                // 		'answerb'=>'oatmeal',
                // 		'answerc'=>'oranges',
                // 		'answerd'=>'pancakes',
                // 	),

                // );
                $questions = array(
                    array(
                        'prompt'=>'Your room is:',
                        'answera'=>'Slightly messy',
                        'answerb'=>'Pretty messy',
                        'answerc'=>'Nicknamed "the pit"',
                        'answerd'=>'Don\'t go in there'
                    ),
                    array(
                        'prompt'=>'How often do you exercise?',
                        'answera'=>'Daily, I get swole',
                        'answerb'=>'Two or three times a week',
                        'answerc'=>'Once or twice a month',
                        'answerd'=>'Hah... exercise'
                    ),
                    array(
                        'prompt'=>'What kind of movies do you prefer?',
                        'answera'=>'Comedy',
                        'answerb'=>'Action/Adventure',
                        'answerc'=>'Science Fiction',
                        'answerd'=>'Horror'
                    ),
                    array(
                        'prompt'=>'How would you spend a free evening?',
                        'answera'=>'Turning up at a rad party',
                        'answerb'=>'Eating to your heart’s content at a new restaurant',
                        'answerc'=>'Netflix Netflix Netflix',
                        'answerd'=>'Observing your neighbors from the comfort of your home'
                    ),
                    array(
                        'prompt'=>'Which groups of sports are you interested in the most?',
                        'answera'=>'Hiking, Swimming, Skiing',
                        'answerb'=>'Football, Baseball, Basketball, Soccer',
                        'answerc'=>'Tennis, Golf, Roller Blading',
                        'answerd'=>'Have little interest in sports'
                    ),array(
                        'prompt'=>'Pick a social media site:',
                        'answera'=>'Facebook',
                        'answerb'=>'Tumblr',
                        'answerc'=>'Instagram',
                        'answerd'=>'Twitter'
                    ),array(
                        'prompt'=>'The main reason to go to the beach is:',
                        'answera'=>'To get a tan',
                        'answerb'=>'To swim/surf',
                        'answerc'=>'To relax',
                        'answerd'=>'I\'m allergic to the sun'
                    ),array(
                        'prompt'=>'If you were a bender, you would be a:',
                        'answera'=>'Waterbender',
                        'answerb'=>'Firebender',
                        'answerc'=>'Earthbender',
                        'answerd'=>'Airbender'
                    ),array(
                        'prompt'=>'Which food group are you?',
                        'answera'=>'Carbohydrates',
                        'answerb'=>'Fruits and Vegetables',
                        'answerc'=>'Dairy',
                        'answerd'=>'Proteins'
                    ),array(
                        'prompt'=>'What\'s your favorite academic subject?',
                        'answera'=>'English',
                        'answerb'=>'Math',
                        'answerc'=>'Science',
                        'answerd'=>'History'
                    ),array(
                        'prompt'=>'What\'s your dream vacation?',
                        'answera'=>'Snowy mountains',
                        'answerb'=>'A tropical island',
                        'answerc'=>'A metropolitan city',
                        'answerd'=>'Staycation with your 7 cats'
                    ),array(
                        'prompt'=>'What\'s your favorite type of pet?',
                        'answera'=>'Dogs',
                        'answerb'=>'Cats',
                        'answerc'=>'Rabbits',
                        'answerd'=>'Fish'
                    ),array(
                        'prompt'=>'What kind of "nerd" are you?',
                        'answera'=>'Super-mega-nerd',
                        'answerb'=>'Homework lover',
                        'answerc'=>'Geek',
                        'answerd'=>'#Nerdfordays'
                    ),array(
                        'prompt'=>'What\'s your favorite alternative?',
                        'answera'=>'Alternative dance ("I\'m a rock, I\'m a tree…")',
                        'answerb'=>'Alternative music ("My lyrics don\'t make sense…")',
                        'answerc'=>'Alternate player ("I only go in if someone gets injured")',
                        'answerd'=>'Alternative alternatives ("I think I\'m smarter than everyone else…")'
                    ),array(
                        'prompt'=>'What fad of this century was your favorite?',
                        'answera'=>'Yolo',
                        'answerb'=>'Silly Bandz',
                        'answerc'=>'Planking',
                        'answerd'=>'Honey Boo Boo'
                    ),array(
                        'prompt'=>'Choose a fear:',
                        'answera'=>'SPIDERS',
                        'answerb'=>'ZOMBIE APOCALYPSE',
                        'answerc'=>'GERMS',
                        'answerd'=>'GETTING ANYTHING BUT AN A ON A TEST'
                    ),array(
                        'prompt'=>'You prefer…?',
                        'answera'=>'Long walks on the beach',
                        'answerb'=>'Getting caught in the rain',
                        'answerc'=>'To be wined and dined (hopefully not… you\'re not 21)',
                        'answerd'=>'Avocado'
                    ),array(
                        'prompt'=>'If you could live in any of these 4 choice places?',
                        'answera'=>'Atlantis',
                        'answerb'=>'Westeros (from Game of Thrones)',
                        'answerc'=>'Hogwarts',
                        'answerd'=>'The North Pole'
                    ),array(
                        'prompt'=>'Which bad guy are you?',
                        'answera'=>'Magneto',
                        'answerb'=>'The Joker',
                        'answerc'=>'The guy who made "Lost" start to suck',
                        'answerd'=>'Now I\'m remembering how bad the ending of Lost was'
                    ),array(
                        'prompt'=>'When you TV/Netflix (both verbs), you?',
                        'answera'=>'Dexter',
                        'answerb'=>'Breaking Bad',
                        'answerc'=>'Sherlock',
                        'answerd'=>'American Horror Story'
                    ),array(
                        'prompt'=>'Favorite Utensil',
                        'answera'=>'Spoon',
                        'answerb'=>'Fork',
                        'answerc'=>'Knife',
                        'answerd'=>'Fingers'
                    ),array(
                        'prompt'=>'Choose a cereal:',
                        'answera'=>'Honey Bunches of Oats',
                        'answerb'=>'Lucky Charms',
                        'answerc'=>'Cinnamon Toast Crunch',
                        'answerd'=>'Frosted Flakes'
                    ),array(
                        'prompt'=>'Favorite Unit of Measurement',
                        'answera'=>'Beard-second: length the average beard grows in one second (10 nanometers)',
                        'answerb'=>'Donkeypower- 250 watts-about a third of a horsepower',
                        'answerc'=>'Kardashian- 72 days of marriage',
                        'answerd'=>'Helen- "the face that launched a thousand ships"  1 millihelen is the amount of beauty needed to launch a single ship'
                    ),array(
                        'prompt'=>'How much do you love ASBC?',
                        'answera'=>'A lot',
                        'answerb'=>'A whole lot!',
                        'answerc'=>'OMG THEY\'RE THE BEST!!!!!!!',
                        'answerd'=>'My passion for ASBC burns with the intensity of 1,000,000 suns'
                    ),                   

                );

                // $questions = array(
                //     array(
                //         'prompt'=>'TEST QUESTION 1',
                //         'answera'=>'Not at all',
                //         'answerb'=>'A whole lot!',
                //         'answerc'=>'OMG THEY\'RE THE BEST!!!!!!!',
                //         'answerd'=>'My passion for ASBC burns with the intensity of 1,000,000 suns'
                //     ),    
                //     array(
                //         'prompt'=>'TEST QUESTION 2',
                //         'answera'=>'Not fds all',
                //         'answerb'=>'A wholfdsafdsfasde lot!',
                //         'answerc'=>'OMG fdsafdTHEY\'RE THE BEST!!!!!!!',
                //         'answerd'=>'My passiofdsafsn for ASBC burns with the intensity of 1,000,000 suns'
                //     ),               

                // );

                // Uncomment the below to run the seeder
                DB::table('questions')->insert($questions);
        }

}
