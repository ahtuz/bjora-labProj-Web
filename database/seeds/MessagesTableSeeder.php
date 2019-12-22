<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
    		[
                'sender_id' => 4,
	            'recipient_id' => 2,
				'message_detail' => "Heart whitened to grey has a color like cappucino.",
				'created_at' => "2019-11-19 12:34:20",
				'updated_at' => "2019-11-19 12:34:20",
	        ],
	        [
                'sender_id' => 2,
	            'recipient_id' => 4,
				'message_detail' => "Don't bother with excuses, let's gulp down the cappucino.",
				'created_at' => "2019-11-19 16:34:20",
				'updated_at' => "2019-11-19 16:34:20",
	        ],
	        [
                'sender_id' => 2,
	            'recipient_id' => 3,
				'message_detail' => "Something's been wrong for a long time.",
				'created_at' => "2019-11-19 06:14:20",
				'updated_at' => "2019-11-19 06:14:20",
	        ],	
	        [
                'sender_id' => 2,
	            'recipient_id' => 4,
				'message_detail' => "As if reluctant, the rain flows.",
				'created_at' => "2019-11-19 02:34:23",
				'updated_at' => "2019-11-19 02:34:23",
	        ],
	        [
                'sender_id' => 3,
	            'recipient_id' => 2,
				'message_detail' => "As we drown in the flowers storming us.",
				'created_at' => "2019-11-19 13:24:20",
				'updated_at' => "2019-11-19 13:24:20",
	        ],
	        [
                'sender_id' => 2,
	            'recipient_id' => 5,
				'message_detail' => "The poem I'm writing you so you won't fade.",
				'created_at' => "2019-11-19 04:54:10",
				'updated_at' => "2019-11-19 04:54:10",
            ],
            [
                'sender_id' => 3,
	            'recipient_id' => 2,
				'message_detail' => "If you can't answer, just one word will do.",
				'created_at' => "2019-11-19 05:54:10",
				'updated_at' => "2019-11-19 05:54:10",
            ],
            [
                'sender_id' => 4,
	            'recipient_id' => 5,
				'message_detail' => "I don't understand. I really don't understand.",
				'created_at' => "2019-11-19 18:54:10",
				'updated_at' => "2019-11-19 18:54:10",
	        ],
        ]);
    }
}
