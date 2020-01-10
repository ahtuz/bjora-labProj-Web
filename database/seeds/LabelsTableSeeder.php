<?php

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_labels')->insert([
    		   [
				'question_label' => "Unspecified",
				'created_at' => "2019-11-19 08:34:20",
				'updated_at' => "2019-11-19 08:34:20",
            ],
            [
				'question_label' => "Finance",
				'created_at' => "2019-11-19 08:34:20",
				'updated_at' => "2019-11-19 08:34:20",
            ],
            [
				'question_label' => "Art",
				'created_at' => "2019-11-19 08:34:20",
				'updated_at' => "2019-11-19 08:34:20",
            ],
            [
				'question_label' => "Health",
				'created_at' => "2019-11-19 08:34:20",
				'updated_at' => "2019-11-19 08:34:20",
            ],
            [
				'question_label' => "Music",
				'created_at' => "2019-11-19 08:34:20",
				'updated_at' => "2019-11-19 08:34:20",
            ],
            [
				'question_label' => "Technology",
				'created_at' => "2019-11-19 08:34:20",
				'updated_at' => "2019-11-19 08:34:20",
            ],
            [
            'question_label' => "Gaming",
            'created_at' => "2019-11-19 08:34:20",
            'updated_at' => "2019-11-19 08:34:20",
            ],
            [
            'question_label' => "Food",
            'created_at' => "2019-11-19 08:34:20",
            'updated_at' => "2019-11-19 08:34:20",
            ],
            [
            'question_label' => "Photography",
            'created_at' => "2019-11-19 08:34:20",
            'updated_at' => "2019-11-19 08:34:20",
            ],
            [
            'question_label' => "Sports",
            'created_at' => "2019-11-19 08:34:20",
            'updated_at' => "2019-11-19 08:34:20",
            ],
            [
            'question_label' => "Design",
            'created_at' => "2019-11-19 08:34:20",
            'updated_at' => "2019-11-19 08:34:20",
            ],
            [
            'question_label' => "Science",
            'created_at' => "2019-11-19 08:34:20",
            'updated_at' => "2019-11-19 08:34:20",
            ],
            [
            'question_label' => "Language",
            'created_at' => "2019-11-19 08:34:20",
            'updated_at' => "2019-11-19 08:34:20",
            ],
        ]);
    }
}
