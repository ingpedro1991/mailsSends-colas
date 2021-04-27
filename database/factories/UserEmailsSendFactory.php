<?php

namespace Database\Factories;

use App\Models\UserEmailsSend;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserEmailsSendFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserEmailsSend::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'destinatario' => $this->faker->word,
        'asunto' => $this->faker->word,
        'mensaje' => $this->faker->text,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
