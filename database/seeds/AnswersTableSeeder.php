<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder for answers table
        DB::table('answers')->insert([
    		[
                'user_id' => 2,
                'question_id' => 1,
	            'answer_detail' => "Obviously, don't remove a drive while transferring data, as you'll corrupt that data, but that's a no-brainer.",
				'created_at' => "2019-11-21 02:44:20",
				'updated_at' => "2019-11-21 02:44:20",
            ],
            [
                'user_id' => 3,
                'question_id' => 1,
	            'answer_detail' => "Short answer? Yes. Wait…but why? You've just yanked it out like a bad tooth so many times and nothing has ever gone wrong.",
				'created_at' => "2019-11-22 03:44:20",
				'updated_at' => "2019-11-22 03:44:20",
	        ],
	        [
                'user_id' => 4,
                'question_id' => 2,
	            'answer_detail' => "I'm not as good as I'd like to be, which is why I keep working. I call my work practice because that's what it is. Lots of practice and skill development.",
				'created_at' => "2019-11-22 05:44:20",
				'updated_at' => "2019-11-22 05:44:20",
            ],
            [
                'user_id' => 2,
                'question_id' => 2,
	            'answer_detail' => "Being able to inspire and delight people through your work. Being able to exercise your creativity. The joy of creating and sharing art. Enjoying the reaction when someone sees your painting of them.",
				'created_at' => "2019-11-22 02:44:20",
				'updated_at' => "2019-11-22 02:44:20",
            ],
            [
                'user_id' => 4,
                'question_id' => 3,
	            'answer_detail' => "Finance is defined as the management of money and includes activities like investing, borrowing, lending, budgeting, saving, and forecasting.",
				'created_at' => "2019-11-22 04:44:20",
				'updated_at' => "2019-11-22 04:44:20",
            ],
            [
                'user_id' => 3,
                'question_id' => 3,
	            'answer_detail' => "This topic focuses on the ability to manage personal finance matters in an efficient manner, and it includes the knowledge of making appropriate decisions about personal finance such as investing, insurance, real estate, paying for college, budgeting, retirement and tax planning.",
				'created_at' => "2019-11-22 04:45:20",
				'updated_at' => "2019-11-22 04:45:20",
            ],
            [
                'user_id' => 5,
                'question_id' => 4,
	            'answer_detail' => "It's hard to get enough active play and exercise if you're always inside playing video games. And without enough exercise, kids can become overweight.",
				'created_at' => "2019-11-22 04:47:20",
				'updated_at' => "2019-11-22 04:47:20",
	        ],
        ]);
    }
}
