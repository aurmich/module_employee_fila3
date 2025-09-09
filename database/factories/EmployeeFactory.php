<?php

declare(strict_types=1);

namespace Modules\Employee\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Employee\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @var string
=======
     * @var class-string<\Modules\Employee\Models\Employee>
>>>>>>> c1ac34e (.)
=======
     * @var string
>>>>>>> da93016 (.)
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null, // Will be set when needed
<<<<<<< HEAD
<<<<<<< HEAD
            'employee_code' => 'EMP' . $this->faker->unique()->numberBetween(1000, 9999),
            'personal_data' => [
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
=======
            'employee_code' => 'EMP'.$this->faker->unique()->numberBetween(1000, 9999),
            'personal_data' => [
                'first_name' => $this->faker->name(),
                'last_name' => $this->faker->name(),
>>>>>>> c1ac34e (.)
=======
            'employee_code' => 'EMP' . $this->faker->unique()->numberBetween(1000, 9999),
            'personal_data' => [
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
>>>>>>> da93016 (.)
                'date_of_birth' => $this->faker->date(),
                'gender' => $this->faker->randomElement(['M', 'F', 'O']),
                'nationality' => $this->faker->countryCode(),
                'marital_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed']),
            ],
            'contact_data' => [
                'email' => $this->faker->unique()->safeEmail(),
                'phone' => $this->faker->phoneNumber(),
                'address' => [
                    'street' => $this->faker->streetAddress(),
                    'city' => $this->faker->city(),
<<<<<<< HEAD
<<<<<<< HEAD
                    'state' => $this->faker->optional()->randomElement(['CA', 'NY', 'TX', 'FL', 'WA', 'IL', 'PA', 'OH']),
=======
                    'state' => 'IT',
>>>>>>> c1ac34e (.)
=======
                    'state' => $this->faker->optional()->randomElement(['CA', 'NY', 'TX', 'FL', 'WA', 'IL', 'PA', 'OH']),
>>>>>>> da93016 (.)
                    'postal_code' => $this->faker->postcode(),
                    'country' => $this->faker->country(),
                ],
            ],
            'work_data' => [
                'employee_id' => $this->faker->unique()->numberBetween(10000, 99999),
                'hire_date' => $this->faker->date(),
                'contract_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'internship']),
                'work_schedule' => $this->faker->randomElement(['9-18', '8-17', 'flexible', 'shift']),
            ],
            'documents' => [
                'id_card' => $this->faker->optional()->uuid(),
                'passport' => $this->faker->optional()->uuid(),
                'work_permit' => $this->faker->optional()->uuid(),
            ],
            'photo_url' => $this->faker->optional()->imageUrl(),
            'status' => $this->faker->randomElement(['attivo', 'inattivo', 'sospeso', 'licenziato']),
            'department_id' => null, // Will be set when needed
            'manager_id' => null, // Will be set when needed
            'position_id' => null, // Will be set when needed
            'salary_data' => [
                'base_salary' => $this->faker->numberBetween(20000, 100000),
                'currency' => 'EUR',
                'payment_frequency' => $this->faker->randomElement(['monthly', 'bi-weekly', 'weekly']),
                'benefits' => $this->faker->optional()->words(3),
            ],
        ];
    }

    /**
     * Indicate that the employee is active.
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
     * Indicate that the employee is inactive.
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
     * Set a specific employee code.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param string $code
     * @return static
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @param string $code
     * @return static
>>>>>>> da93016 (.)
     */
    public function withCode(string $code): static
    {
        return $this->state(fn (array $attributes) => [
            'employee_code' => $code,
        ]);
    }

    /**
     * Set specific personal data.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param array $personalData
     * @return static
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @param array $personalData
     * @return static
>>>>>>> da93016 (.)
     */
    public function withPersonalData(array $personalData): static
    {
        return $this->state(fn (array $attributes) => [
            'personal_data' => array_merge($attributes['personal_data'], $personalData),
        ]);
    }

    /**
     * Set specific contact data.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param array $contactData
     * @return static
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @param array $contactData
     * @return static
>>>>>>> da93016 (.)
     */
    public function withContactData(array $contactData): static
    {
        return $this->state(fn (array $attributes) => [
            'contact_data' => array_merge($attributes['contact_data'], $contactData),
        ]);
    }

    /**
     * Set a specific status.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param string $status
     * @return static
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @param string $status
     * @return static
>>>>>>> da93016 (.)
     */
    public function withStatus(string $status): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => $status,
        ]);
    }
}
