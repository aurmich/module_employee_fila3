<?php

declare(strict_types=1);

namespace Modules\Employee\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
>>>>>>> 95b3a4c (.)
=======
use Illuminate\Support\Collection;
>>>>>>> 6229c57 (.)
use Modules\Employee\Models\WorkHour;
use Modules\User\Models\User;

class WorkHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // Get all users or create some if none exist
        /** @var \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users */
        $users = User::all();

=======
        $users = User::all();
>>>>>>> 95b3a4c (.)
        if ($users->isEmpty()) {
            $users = User::factory(5)->create();
        }

<<<<<<< HEAD
        // Create work hour entries for the last 30 days
=======
>>>>>>> 95b3a4c (.)
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();

        foreach ($users as $user) {
            $currentDate = $startDate->copy();
<<<<<<< HEAD

            while ($currentDate->lte($endDate)) {
                // Skip weekends (optional - remove if you want weekend entries)
                if ($currentDate->isWeekend()) {
                    $currentDate->addDay();

=======
            while ($currentDate->lte($endDate)) {
                if ($currentDate->isWeekend()) {
                    $currentDate->addDay();
<<<<<<< HEAD
>>>>>>> 95b3a4c (.)
=======

>>>>>>> 6229c57 (.)
                    continue;
                }

                // 80% chance of having work entries for each day
                if (rand(1, 100) <= 80) {
                    $this->createWorkDayEntries($user->id, $currentDate->copy());
                }

                $currentDate->addDay();
            }
        }

<<<<<<< HEAD
        // Create some incomplete work days (for testing validation)
        $this->createIncompleteWorkDays($users->take(2));
    }

    /**
     * Create a complete work day sequence for a user.
     */
    private function createWorkDayEntries(int $employeeId, Carbon $date): void
    {
        // Clock in (8:00-9:30 AM)
        $clockInTime = $date->copy()->setTime(
            rand(8, 9),
            collect([0, 15, 30, 45])->random(),
            0
        );

=======
        $this->createIncompleteWorkDays($users);
    }

    private function createWorkDayEntries(int $employeeId, Carbon $date): void
    {
        $clockInTime = $date->copy()->setTime(rand(7, 9), rand(0, 59), 0);
>>>>>>> 95b3a4c (.)
        WorkHour::create([
            'employee_id' => $employeeId,
            'timestamp' => $clockInTime,
            'type' => 'clock_in',
<<<<<<< HEAD
            'notes' => rand(1, 100) <= 20 ? 'Started work' : null,
            'status' => 'approved',
        ]);

        // Break start (12:00-1:00 PM)
=======
            'notes' => rand(1, 100) <= 10 ? 'Morning shift' : null,
            'status' => 'approved',
        ]);

        // Break start (3-5 hours later)
>>>>>>> 95b3a4c (.)
        $breakStartTime = $clockInTime->copy()->addHours(rand(3, 5))->addMinutes(rand(0, 30));
        WorkHour::create([
            'employee_id' => $employeeId,
            'timestamp' => $breakStartTime,
            'type' => 'break_start',
            'notes' => rand(1, 100) <= 10 ? 'Lunch break' : null,
            'status' => 'approved',
        ]);

        // Break end (30-60 minutes later)
        $breakEndTime = $breakStartTime->copy()->addMinutes(rand(30, 60));
        WorkHour::create([
            'employee_id' => $employeeId,
            'timestamp' => $breakEndTime,
            'type' => 'break_end',
            'notes' => rand(1, 100) <= 10 ? 'Back from lunch' : null,
            'status' => 'approved',
        ]);

<<<<<<< HEAD
        // Clock out (5:00-7:00 PM)
=======
        // Clock out (3-5 hours after break end)
>>>>>>> 95b3a4c (.)
        $clockOutTime = $breakEndTime->copy()->addHours(rand(3, 5))->addMinutes(rand(0, 30));
        WorkHour::create([
            'employee_id' => $employeeId,
            'timestamp' => $clockOutTime,
            'type' => 'clock_out',
            'notes' => rand(1, 100) <= 20 ? 'End of work day' : null,
            'status' => 'approved',
        ]);
    }

    /**
     * Create some incomplete work days for testing.
<<<<<<< HEAD
     *
     * @param  \Illuminate\Support\Collection<int, User>  $users
     */
    private function createIncompleteWorkDays(Collection $users): void
=======
     */
    /**
     * @param \Illuminate\Database\Eloquent\Collection<int, \Modules\Employee\Models\Employee> $users
     */
<<<<<<< HEAD
    private function createIncompleteWorkDays($users): void
>>>>>>> 95b3a4c (.)
=======
    private function createIncompleteWorkDays(Collection $users): void
>>>>>>> 6229c57 (.)
    {
        foreach ($users as $user) {
            $today = Carbon::today();

            // User who clocked in but didn't clock out
            WorkHour::create([
                'employee_id' => $user->id,
                'timestamp' => $today->copy()->setTime(8, 30, 0),
                'type' => 'clock_in',
                'notes' => 'Current work session',
                'status' => 'pending',
            ]);

<<<<<<< HEAD
            // User on break
=======
            // User on break yesterday
>>>>>>> 95b3a4c (.)
            $yesterday = Carbon::yesterday();
            WorkHour::create([
                'employee_id' => $user->id,
                'timestamp' => $yesterday->copy()->setTime(8, 0, 0),
                'type' => 'clock_in',
                'status' => 'approved',
            ]);

            WorkHour::create([
                'employee_id' => $user->id,
                'timestamp' => $yesterday->copy()->setTime(12, 0, 0),
                'type' => 'break_start',
                'notes' => 'Extended lunch break',
                'status' => 'pending',
            ]);
        }
    }
}
