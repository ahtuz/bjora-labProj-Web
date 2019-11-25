<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// seeder for questions table
        DB::table('questions')->insert([
    		[
                'user_id' => 1,
	            'question_detail' => "Do I Really Need to “Eject” USB Drives?",
	            'question_label' => "Technology",

	        ],
	        [
                'user_id' => 1,
	            'question_detail' => "How to consider yourself a good artist?",
	            'question_label' => "Art",
	        ],
	        [
                'user_id' => 2,
	            'question_detail' => "What are the basics of finance?",
	            'question_label' => "Finance",
	        ],	
	        [
                'user_id' => 2,
	            'question_detail' => "Is playing video games bad for you?",
	            'question_label' => "Gaming",
	        ],
	        [
                'user_id' => 3,
	            'question_detail' => "When did LoFi Hip Hop start?",
	            'question_label' => "Music",
	        ],
	        [
                'user_id' => 3,
	            'question_detail' => "What is the best medical advice website?",
	            'question_label' => "Health",
	        ],
        ]);
    }
}
