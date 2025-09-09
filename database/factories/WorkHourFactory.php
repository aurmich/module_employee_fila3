<?php

declare(strict_types=1);

namespace Modules\Employee\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\Employee\Models\WorkHour;
use Modules\Employee\Models\Employee;
=======
use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
use Modules\Employee\Models\Employee;
use Modules\Employee\Models\WorkHour;
>>>>>>> c1ac34e (.)

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Employee\Models\WorkHour>
 */
class WorkHourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
     * @var string
=======
     * @var class-string<\Modules\Employee\Models\WorkHour>
>>>>>>> c1ac34e (.)
     */
    protected $model = WorkHour::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $timestamp = $this->faker->dateTimeBetween('-30 days', 'now');
<<<<<<< HEAD
        $carbonTimestamp = Carbon::instance($timestamp)->setTime(
            $this->faker->numberBetween(8, 18), // Hour between 8 AM and 6 PM
            $this->faker->randomElement([0, 15, 30, 45]), // Minutes in 15-minute intervals
            0 // Seconds
        );
        
        return [
            'employee_id' => Employee::factory(),
            'type' => $this->faker->randomElement(WorkHour::TYPES),
=======
        /** @var int $hour */
        $hour = $this->faker->numberBetween(8, 18);
        /** @var int $minute */
        $minute = $this->faker->randomElement([0, 15, 30, 45]);
        $carbonTimestamp = Carbon::instance($timestamp)->setTime($hour, $minute, 0);

        return [
            'employee_id' => Employee::factory(),
            'type' => $this->faker->randomElement(WorkHourTypeEnum::cases()),
>>>>>>> c1ac34e (.)
            'timestamp' => $carbonTimestamp,
            'location_lat' => $this->faker->optional(0.3)->latitude(),
            'location_lng' => $this->faker->optional(0.3)->longitude(),
            'location_name' => $this->faker->optional(0.3)->address(),
            'device_info' => $this->faker->optional(0.2)->randomElements([
                'device_type' => 'mobile',
                'browser' => $this->faker->userAgent(),
                'ip_address' => $this->faker->ipv4(),
            ]),
            'photo_path' => $this->faker->optional(0.1)->imageUrl(),
            'notes' => $this->faker->optional(0.3)->sentence(),
<<<<<<< HEAD
            'status' => $this->faker->randomElement(WorkHour::STATUSES),
=======
            'status' => $this->faker->randomElement(WorkHourStatusEnum::cases()),
>>>>>>> c1ac34e (.)
            'approved_by' => $this->faker->optional(0.4)->numberBetween(1, 10),
            'approved_at' => $this->faker->optional(0.4)->dateTimeBetween('-7 days', 'now'),
        ];
    }

    /**
     * Create a realistic work day sequence for an employee.
     *
<<<<<<< HEAD
     * @param int $employeeId
     * @param Carbon $date
     * @return array<WorkHour>
=======
     * @return array<int, WorkHour>
>>>>>>> c1ac34e (.)
     */
    public function workDaySequence(int $employeeId, Carbon $date): array
    {
        $entries = [];
<<<<<<< HEAD
        
        // Clock in (8:00-9:30 AM)
        $clockInTime = $date->copy()->setTime(
            $this->faker->numberBetween(8, 9),
            $this->faker->randomElement([0, 15, 30, 45])
        );
        
        $entries[] = $this->state([
            'employee_id' => $employeeId,
            'timestamp' => $clockInTime,
            'type' => WorkHour::TYPE_CLOCK_IN,
            'status' => WorkHour::STATUS_APPROVED,
=======

        // Clock in (8:00-9:30 AM)
        /** @var int $clockInHour */
        $clockInHour = $this->faker->numberBetween(8, 9);
        /** @var int $clockInMinute */
        $clockInMinute = $this->faker->randomElement([0, 15, 30, 45]);
        $clockInTime = $date->copy()->setTime($clockInHour, $clockInMinute);

        $entries[] = $this->state([
            'employee_id' => $employeeId,
            'timestamp' => $clockInTime,
            'type' => WorkHourTypeEnum::CLOCK_IN,
            'status' => WorkHourStatusEnum::APPROVED,
>>>>>>> c1ac34e (.)
        ])->make();

        // Break start (12:00-1:00 PM)
        $breakStartTime = $clockInTime->copy()->addHours($this->faker->numberBetween(3, 5));
        $entries[] = $this->state([
            'employee_id' => $employeeId,
            'timestamp' => $breakStartTime,
<<<<<<< HEAD
            'type' => WorkHour::TYPE_BREAK_START,
            'status' => WorkHour::STATUS_APPROVED,
=======
            'type' => WorkHourTypeEnum::BREAK_START,
            'status' => WorkHourStatusEnum::APPROVED,
>>>>>>> c1ac34e (.)
        ])->make();

        // Break end (30-60 minutes later)
        $breakEndTime = $breakStartTime->copy()->addMinutes($this->faker->numberBetween(30, 60));
        $entries[] = $this->state([
            'employee_id' => $employeeId,
            'timestamp' => $breakEndTime,
<<<<<<< HEAD
            'type' => WorkHour::TYPE_BREAK_END,
            'status' => WorkHour::STATUS_APPROVED,
=======
            'type' => WorkHourTypeEnum::BREAK_END,
            'status' => WorkHourStatusEnum::APPROVED,
>>>>>>> c1ac34e (.)
        ])->make();

        // Clock out (5:00-7:00 PM)
        $clockOutTime = $breakEndTime->copy()->addHours($this->faker->numberBetween(3, 5));
        $entries[] = $this->state([
            'employee_id' => $employeeId,
            'timestamp' => $clockOutTime,
<<<<<<< HEAD
            'type' => WorkHour::TYPE_CLOCK_OUT,
            'status' => WorkHour::STATUS_APPROVED,
=======
            'type' => WorkHourTypeEnum::CLOCK_OUT,
            'status' => WorkHourStatusEnum::APPROVED,
>>>>>>> c1ac34e (.)
        ])->make();

        return $entries;
    }

    /**
     * Create a clock in entry.
     */
    public function clockIn(): static
    {
        return $this->state([
<<<<<<< HEAD
            'type' => WorkHour::TYPE_CLOCK_IN,
            'time' => $this->faker->dateTimeBetween('08:00', '09:30'),
=======
            'type' => WorkHourTypeEnum::CLOCK_IN,
            'timestamp' => $this->faker->dateTimeBetween('08:00', '09:30'),
>>>>>>> c1ac34e (.)
        ]);
    }

    /**
     * Create a clock out entry.
     */
    public function clockOut(): static
    {
        return $this->state([
<<<<<<< HEAD
            'type' => WorkHour::TYPE_CLOCK_OUT,
            'time' => $this->faker->dateTimeBetween('17:00', '19:00'),
=======
            'type' => WorkHourTypeEnum::CLOCK_OUT,
            'timestamp' => $this->faker->dateTimeBetween('17:00', '19:00'),
>>>>>>> c1ac34e (.)
        ]);
    }

    /**
     * Create a break start entry.
     */
    public function breakStart(): static
    {
        return $this->state([
<<<<<<< HEAD
            'type' => WorkHour::TYPE_BREAK_START,
            'time' => $this->faker->dateTimeBetween('12:00', '14:00'),
=======
            'type' => WorkHourTypeEnum::BREAK_START,
            'timestamp' => $this->faker->dateTimeBetween('12:00', '14:00'),
>>>>>>> c1ac34e (.)
        ]);
    }

    /**
     * Create a break end entry.
     */
    public function breakEnd(): static
    {
        return $this->state([
<<<<<<< HEAD
            'type' => WorkHour::TYPE_BREAK_END,
            'time' => $this->faker->dateTimeBetween('12:30', '14:30'),
=======
            'type' => WorkHourTypeEnum::BREAK_END,
            'timestamp' => $this->faker->dateTimeBetween('13:00', '14:00'),
>>>>>>> c1ac34e (.)
        ]);
    }

    /**
     * Create entries for today.
     */
    public function today(): static
    {
        return $this->state([
            'date' => Carbon::today()->toDateString(),
            'time' => Carbon::now(),
        ]);
    }

    /**
     * Create entries for a specific date.
     */
    public function forDate(Carbon $date): static
    {
        return $this->state([
            'date' => $date->toDateString(),
<<<<<<< HEAD
            'time' => $date->copy()->setTime(
                $this->faker->numberBetween(8, 18),
                $this->faker->randomElement([0, 15, 30, 45])
=======
            'timestamp' => $date->copy()->setTime(
                /** @var int */ $this->faker->numberBetween(8, 18),
                /** @var int */ $this->faker->randomElement([0, 15, 30, 45])
>>>>>>> c1ac34e (.)
            ),
        ]);
    }

    /**
     * Create entries with notes.
     */
    public function withNotes(): static
    {
        return $this->state([
            'notes' => $this->faker->sentence(),
        ]);
    }

    /**
     * Create entries with badge ID.
     */
    public function withBadge(): static
    {
        return $this->state([
            'badge_id' => $this->faker->numerify('EMP####'),
        ]);
    }
}
