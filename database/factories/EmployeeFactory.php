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
     * @var class-string<\Modules\Employee\Models\Employee>
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
<<<<<<< HEAD
            'user_id' => null, // Will be set when needed
            'employee_code' => 'EMP'.$this->faker->unique()->numberBetween(1000, 9999),
            'personal_data' => [
                'first_name' => $this->faker->name(),
                'last_name' => $this->faker->name(),
=======
            'user_id' => null,
            'employee_code' => 'EMP'.$this->faker->unique()->numberBetween(1000, 9999),
            'personal_data' => [
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
>>>>>>> 95b3a4c (.)
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
                    'state' => 'IT',
=======
                    'state' => $this->faker->state(),
>>>>>>> 95b3a4c (.)
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
<<<<<<< HEAD
            'department_id' => null, // Will be set when needed
            'manager_id' => null, // Will be set when needed
            'position_id' => null, // Will be set when needed
=======
            'department_id' => null,
            'manager_id' => null,
            'position_id' => null,
>>>>>>> 95b3a4c (.)
            'salary_data' => [
                'base_salary' => $this->faker->numberBetween(20000, 100000),
                'currency' => 'EUR',
                'payment_frequency' => $this->faker->randomElement(['monthly', 'bi-weekly', 'weekly']),
<<<<<<< HEAD
                'benefits' => $this->faker->optional()->words(3),
=======
                'benefits' => $this->faker->optional()->words(3, false),
>>>>>>> 95b3a4c (.)
            ],
        ];
    }

    /**
     * Indicate that the employee is active.
<<<<<<< HEAD
=======
     *
     * @return static
>>>>>>> 95b3a4c (.)
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
=======
     *
     * @return static
>>>>>>> 95b3a4c (.)
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inattivo',
        ]);
    }

    /**
     * Set a specific employee code.
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
=======
     *
     * @param array<string, mixed> $personalData
>>>>>>> 95b3a4c (.)
     */
    public function withPersonalData(array $personalData): static
    {
        return $this->state(fn (array $attributes) => [
<<<<<<< HEAD
            'personal_data' => array_merge($attributes['personal_data'], $personalData),
=======
            'personal_data' => array_merge($attributes['personal_data'] ?? [], $personalData),
>>>>>>> 95b3a4c (.)
        ]);
    }

    /**
     * Set specific contact data.
<<<<<<< HEAD
=======
     *
     * @param array<string, mixed> $contactData
>>>>>>> 95b3a4c (.)
     */
    public function withContactData(array $contactData): static
    {
        return $this->state(fn (array $attributes) => [
<<<<<<< HEAD
            'contact_data' => array_merge($attributes['contact_data'], $contactData),
=======
            'contact_data' => array_merge($attributes['contact_data'] ?? [], $contactData),
>>>>>>> 95b3a4c (.)
        ]);
    }

    /**
     * Set a specific status.
     */
    public function withStatus(string $status): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => $status,
        ]);
    }
}
