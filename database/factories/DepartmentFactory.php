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
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'name' => $this->faker->unique()->randomElement(['HR', 'IT', 'Sales', 'Marketing', 'Finance', 'Operations']),
=======
            'name' => $this->faker->unique()->word().' Department',
>>>>>>> c1ac34e (.)
=======
            'name' => $this->faker->unique()->randomElement(['HR', 'IT', 'Sales', 'Marketing', 'Finance', 'Operations']),
>>>>>>> da93016 (.)
            'description' => $this->faker->optional()->sentence(),
            'status' => $this->faker->randomElement(['attivo', 'inattivo']),
            'manager_id' => null, // Will be set when needed
        ];
    }

    /**
     * Indicate that the department is active.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return static
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @return static
>>>>>>> da93016 (.)
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'attivo',
        ]);
    }

    /**
     * Indicate that the department is inactive.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return static
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @return static
>>>>>>> da93016 (.)
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inattivo',
        ]);
    }

    /**
     * Set a specific department name.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param string $name
     * @return static
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @param string $name
     * @return static
>>>>>>> da93016 (.)
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
<<<<<<< HEAD
     *
     * @param string $description
     * @return static
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @param string $description
     * @return static
>>>>>>> da93016 (.)
     */
    public function withDescription(string $description): static
    {
        return $this->state(fn (array $attributes) => [
            'description' => $description,
        ]);
    }
}
