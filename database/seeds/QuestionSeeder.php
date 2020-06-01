<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = array();
        for ($i = 0; $i < 9; $i++)
        {
            $j = $i+1;
            $questions[$i] = [
                'name' => "Aussage $j",
                'shortName' => "r01e0$j",
                'description' => "Beschreibung $j",
            ];
        }

        foreach ($questions as $q) {
            $Question = new Question(
                [
                    'name' => $q['name'],
                    'shortName' => $q['shortName'],
                    'description' => $q['description'],
                    'inverted' => 0,
                ]
            );
            $Question->save();
        }
    }
}
