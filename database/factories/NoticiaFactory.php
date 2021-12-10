<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usuario' => 1,
            'titulo' => $this->faker->realText(),
            'autor' => $this->faker->firstName(),
            'data_publicacao' => $this->faker->date(),
            'data_atualizacao' => $this->faker->date(),
            'texto' => $this->faker->text(),
            'url_img' => $this->faker->url(),
        ];
    }
}
