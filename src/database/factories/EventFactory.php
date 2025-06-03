<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Wedding;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wedding_id' => Wedding::factory(),
            'event_name' => $this->faker->sentence(3),
            'event_date' => $this->faker->dateTimeBetween('now', '+2 years'),
            'event_location' => $this->faker->address(),
            'description' => $this->faker->paragraph(),
            'link_embed' => $this->faker->url(),
        ];
    }
}
