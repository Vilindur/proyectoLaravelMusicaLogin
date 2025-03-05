<?php

namespace Database\Factories;

use App\Models\Cancion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cancion>
 */
class CancionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Cancion::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->randomElement(['Power Slam', 'Adventure of a Lifetime', 'Winter Morning', 'Pulse Power', 'Maverick Hunter', 'Futurisma', 'King of the Streets', 'Valley', 'Dance Around the World', 'A perfect Hero']),
            'artista' => $this->faker->randomElement(['Paradelous', 'Coldplay', 'Purrple Cat', 'Dynatron', 'Carpenter Brut', 'Flashworx', 'Lazerhawk', 'Leavv', 'The Delta Queens', 'Maurizio Dejorio']),
            'album' => $this->faker->randomElement(['Sons of the Light', 'Travels in Time', 'Aether Dreams', 'Hypersonic', 'The nightmare before the dawn', 'TimeLapse', 'Overdrive', 'Dreams Garden', 'Eurobeat Collection 1996', 'Loneliness']),
            'genero' => $this->faker->randomElement(['Eurobeat', 'Pop', 'Chillwave', 'Synthwave', 'Cosmicwave', 'Rock', 'Alternative', 'Ambiental Music', 'Dance', 'Italo Disco']),
            'fecha_lanzamiento' => $this->faker->dateTimeBetween('-35 years', 'now')->format('Y-m-d'),
            'precio' => $this->faker->randomFloat(2, 0.30, 20.00),
            'puntuacion' => $this->faker->randomFloat(2, 0.0, 5.0),
            'imagen' => 'img/' . $this->faker->randomElement(['portada1.jpg', 'portada2.jpeg', 'portada3.jpg', 'portada4.jpg', 'portada5.jpg', 'portada6.jpg', 'portada7.jpg', 'portada8.jpg', 'portada9.jpg', 'portada10.webp']),
        ];
    }
}
