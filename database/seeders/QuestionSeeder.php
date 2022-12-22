<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,20) as $index => $item)
        {
            Question::create([
                'priority' => $index + 1,
                'body' => fake()->text($maxNbChars = 200),
                'answers' => json_encode(fake()->sentences($nb = 4, $asText = false)),
                'correct' => fake()->numberBetween(0,3)
            ]);
        }
    }
}
