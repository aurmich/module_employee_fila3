<?php

declare(strict_types=1);

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Models\Position;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Employee\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Modules\Employee\Models\Position>
     */
<<<<<<< HEAD
    protected $model = Position::class;
=======
    protected $model = \Modules\Employee\Models\Position::class;
>>>>>>> 95b3a4c (.)

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->jobTitle(),
            'description' => $this->faker->optional()->sentence(),
<<<<<<< HEAD
            'level' => $this->faker->randomElement(['entry', 'junior', 'senior', 'lead', 'manager', 'director', 'executive']),
            'status' => $this->faker->randomElement(['attivo', 'inattivo']),
=======
            'department' => $this->faker->randomElement(['HR', 'IT', 'Sales', 'Marketing', 'Finance', 'Operations']),
            'level' => $this->faker->numberBetween(1, 10),
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
>>>>>>> 95b3a4c (.)
        ];
    }

    /**
     * Indicate that the position is active.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return static
>>>>>>> 95b3a4c (.)
=======
>>>>>>> 6229c57 (.)
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
<<<<<<< HEAD
            'status' => 'attivo',
=======
            'is_active' => true,
>>>>>>> 95b3a4c (.)
        ]);
    }

    /**
     * Indicate that the position is inactive.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return static
>>>>>>> 95b3a4c (.)
=======
>>>>>>> 6229c57 (.)
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
<<<<<<< HEAD
            'status' => 'inattivo',
=======
            'is_active' => false,
>>>>>>> 95b3a4c (.)
        ]);
    }

    /**
     * Set a specific position title.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @param string $title
     * @return static
>>>>>>> 95b3a4c (.)
=======
>>>>>>> 6229c57 (.)
     */
    public function withTitle(string $title): static
    {
        return $this->state(fn (array $attributes) => [
            'title' => $title,
        ]);
    }

    /**
     * Set a specific level.
<<<<<<< HEAD
     */
    public function withLevel(string $level): static
=======
     *
     * @param int $level
     * @return static
     */
    public function withLevel(int $level): static
>>>>>>> 95b3a4c (.)
    {
        return $this->state(fn (array $attributes) => [
            'level' => $level,
        ]);
    }

    /**
     * Set a specific description.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @param string $description
     * @return static
>>>>>>> 95b3a4c (.)
=======
>>>>>>> 6229c57 (.)
     */
    public function withDescription(string $description): static
    {
        return $this->state(fn (array $attributes) => [
            'description' => $description,
        ]);
    }
}
