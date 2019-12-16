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
				'label_id' => 6,
				'status' => 1,
				'created_at' => "2019-11-19 02:34:20",
				'updated_at' => "2019-11-19 02:34:20",
	        ],
	        [
                'user_id' => 1,
	            'question_detail' => "How to consider yourself a good artist?",
				'label_id' => 1,
				'status' => 1,
				'created_at' => "2019-11-19 06:34:20",
				'updated_at' => "2019-11-19 06:34:20",
	        ],
	        [
                'user_id' => 2,
	            'question_detail' => "What are the basics of finance?",
				'label_id' => 2,
				'status' => 0,
				'created_at' => "2019-11-19 06:34:20",
				'updated_at' => "2019-11-19 06:34:20",
	        ],	
	        [
                'user_id' => 2,
	            'question_detail' => "Is playing video games bad for you?",
				'label_id' => 7,
				'status' => 1,
				'created_at' => "2019-11-19 01:34:20",
				'updated_at' => "2019-11-19 01:34:20",
	        ],
	        [
                'user_id' => 3,
	            'question_detail' => "When did LoFi Hip Hop start?",
				'label_id' => 5,
				'status' => 0,
				'created_at' => "2019-11-19 03:34:20",
				'updated_at' => "2019-11-19 03:34:20",
	        ],
	        [
                'user_id' => 3,
	            'question_detail' => "What is the best medical advice website?",
				'label_id' => 4,
				'status' => 1,
				'created_at' => "2019-11-19 02:34:20",
				'updated_at' => "2019-11-19 02:34:20",
	        ],
        ]);
    }
}
