<?php

declare(strict_types=1);

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Employee\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var string
     */
    protected $model = Department::class;
=======
     * @var class-string<\Modules\Employee\Models\Department>
     */
    protected $model = \Modules\Employee\Models\Department::class;
>>>>>>> 95b3a4c (.)

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'name' => $this->faker->unique()->word().' Department',
            'description' => $this->faker->optional()->sentence(),
            'status' => $this->faker->randomElement(['attivo', 'inattivo']),
=======
            'name' => $this->faker->unique()->randomElement(['HR', 'IT', 'Sales', 'Marketing', 'Finance', 'Operations']),
            'description' => $this->faker->optional()->sentence(),
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
>>>>>>> 95b3a4c (.)
            'manager_id' => null, // Will be set when needed
        ];
    }

    /**
     * Indicate that the department is active.
<<<<<<< HEAD
=======
     *
     * @return static
>>>>>>> 95b3a4c (.)
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
     * Indicate that the department is inactive.
<<<<<<< HEAD
=======
     *
     * @return static
>>>>>>> 95b3a4c (.)
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
     * Set a specific department name.
<<<<<<< HEAD
=======
     *
     * @param string $name
     * @return static
>>>>>>> 95b3a4c (.)
     */
    public function withName(string $name): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $name,
        ]);
    }

    /**
     * Set a specific description.
<<<<<<< HEAD
=======
     *
     * @param string $description
     * @return static
>>>>>>> 95b3a4c (.)
     */
    public function withDescription(string $description): static
    {
        return $this->state(fn (array $attributes) => [
            'description' => $description,
        ]);
    }
}
