<?php

namespace Database\Factories;

use App\Models\Input;
use Illuminate\Database\Eloquent\Factories\Factory;

class InputFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Input::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->word,
            'last_name'=>$this->faker->word,
            'national_number'=>$this->faker->ean8(),
            'civil_state'=>$this->faker->randomElement(['married', 'divorced']),
            'gander'=>$this->faker->randomElement(['male', 'female']),
            'birth_year'=>rand(1950,2020),
            'prosthetics_number'=>rand(1,4),
            'center_name'=>$this->faker->city,
            'level'=>$this->faker->randomElement(['first','second','therd']),
            'form_no'=>$this->faker->unique()->randomDigit,
            'available_doc'=>$this->faker->word,
            'service'=>$this->faker->randomElement(['repair','proth']),
            'type'=>$this->faker->word,
            'cause'=>$this->faker->word,
            'date'=>$this->faker->date,
            'not'=>$this->faker->text,

        ];
    }
}
