<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Wedding;
use App\Models\SettupTemplate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wedding>
 */
class WeddingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wedding::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wedding_date' => $this->faker->dateTimeBetween('+1 month', '+2 years'),
            'bride_name' => $this->faker->name('female'),
            'groom_name' => $this->faker->name('male'),
            'about_bride' => $this->faker->paragraph(3),
            'about_groom' => $this->faker->paragraph(3),
            'bride_mother' => $this->faker->name('female'),
            'brider_father' => $this->faker->name('male'),
            'groom_mother' => $this->faker->name('female'),
            'groom_father' => $this->faker->name('male'),
            'created_by' => User::factory(),
            'template_id' => SettupTemplate::factory(),
        ];
    }

    /**
     * Configure the wedding to use a specific template.
     */
    public function withTemplate(SettupTemplate $template): static
    {
        return $this->state(fn (array $attributes) => [
            'template_id' => $template->id,
        ]);
    }

    /**
     * Configure the wedding with a specific creator.
     */
    public function createdBy(User $user): static
    {
        return $this->state(fn (array $attributes) => [
            'created_by' => $user->id,
        ]);
    }

    /**
     * Configure the wedding with an upcoming date.
     */
    public function upcoming(): static
    {
        return $this->state(fn (array $attributes) => [
            'wedding_date' => $this->faker->dateTimeBetween('now', '+6 months'),
        ]);
    }

    /**
     * Configure the wedding with a past date.
     */
    public function past(): static
    {
        return $this->state(fn (array $attributes) => [
            'wedding_date' => $this->faker->dateTimeBetween('-1 year', 'yesterday'),
        ]);
    }
}
