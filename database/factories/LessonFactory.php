<?php

namespace Database\Factories;

use App\Models\lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'test_id' = $this ->faker->test_id,
            'rank' = $this ->faker->rank,
            'lessonName' = $this ->faker->lessonName,
            'question_count' = $this ->faker->question_count
        ];
    }
}
