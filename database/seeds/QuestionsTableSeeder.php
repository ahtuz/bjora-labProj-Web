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
				'status' => 1,
				'created_at' => "2019-11-19 02:34:20",
				'updated_at' => "2019-11-19 02:34:20",
	        ],
	        [
                'user_id' => 1,
	            'question_detail' => "How to consider yourself a good artist?",
				'question_label' => "Art",
				'status' => 1,
				'created_at' => "2019-11-19 06:34:20",
				'updated_at' => "2019-11-19 06:34:20",
	        ],
	        [
                'user_id' => 2,
	            'question_detail' => "What are the basics of finance?",
				'question_label' => "Finance",
				'status' => 0,
				'created_at' => "2019-11-19 06:34:20",
				'updated_at' => "2019-11-19 06:34:20",
	        ],	
	        [
                'user_id' => 2,
	            'question_detail' => "Is playing video games bad for you?",
				'question_label' => "Gaming",
				'status' => 1,
				'created_at' => "2019-11-19 01:34:20",
				'updated_at' => "2019-11-19 01:34:20",
	        ],
	        [
                'user_id' => 3,
	            'question_detail' => "When did LoFi Hip Hop start?",
				'question_label' => "Music",
				'status' => 0,
				'created_at' => "2019-11-19 03:34:20",
				'updated_at' => "2019-11-19 03:34:20",
	        ],
	        [
                'user_id' => 3,
	            'question_detail' => "What is the best medical advice website?",
				'question_label' => "Health",
				'status' => 1,
				'created_at' => "2019-11-19 02:34:20",
				'updated_at' => "2019-11-19 02:34:20",
	        ],
        ]);
    }
}
