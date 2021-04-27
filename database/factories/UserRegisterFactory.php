<?php

namespace Database\Factories;

use App\Models\UserRegister;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserRegisterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserRegister::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'cedula' => $this->faker->word,
            'numero_celular' => $this->faker->word,
            'fecha_nacimiento' => $this->faker->word,
            'email' => $this->faker->word,
            'email_verified_at' => $this->faker->date('Y-m-d'),
            'password' => $this->faker->word,
            'rol_id' => $this->faker->randomDigitNotNull,
            'remember_token' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
