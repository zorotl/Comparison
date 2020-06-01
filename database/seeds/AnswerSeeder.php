<?php

use Illuminate\Database\Seeder;
use App\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer = new Answer(
            [
                'user_id' => 1,
                'answers' => '{"1":"ja","2":"ev","3":"nein","4":"ja","5":"ev","6":"ja","7":"nein","8":"ev","9":"nein"}',
                'created_at' => "2020-06-01 19:24:07",
                'updated_at' => "2020-06-01 19:24:18",
            ]
        );
        $answer->save();

        $answer = new Answer(
            [
                'user_id' => 2,
                'answers' => '{"1":"ja","2":"ev","3":"nein","4":"ev","5":"ja","6":"nein","7":"ja","8":"nein","9":"ev"}',
                'created_at' => "2020-06-01 19:24:07",
                'updated_at' => "2020-06-01 19:24:18",
            ]
        );
        $answer->save();
    }
}
