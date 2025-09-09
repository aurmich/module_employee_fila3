<?php

declare(strict_types=1);

namespace Modules\Employee\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Collection;
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
use Modules\Employee\Models\WorkHour;
use Modules\User\Models\User;

class WorkHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users or create some if none exist
<<<<<<< HEAD
<<<<<<< HEAD
        $users = User::all();
        
=======
        /** @var \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users */
        $users = User::all();

>>>>>>> c1ac34e (.)
=======
        $users = User::all();
        
>>>>>>> da93016 (.)
        if ($users->isEmpty()) {
            $users = User::factory(5)->create();
        }

        // Create work hour entries for the last 30 days
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();

        foreach ($users as $user) {
            $currentDate = $startDate->copy();
<<<<<<< HEAD
<<<<<<< HEAD
            
=======

>>>>>>> c1ac34e (.)
=======
            
>>>>>>> da93016 (.)
            while ($currentDate->lte($endDate)) {
                // Skip weekends (optional - remove if you want weekend entries)
                if ($currentDate->isWeekend()) {
                    $currentDate->addDay();
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
                    continue;
                }

                // 80% chance of having work entries for each day
                if (rand(1, 100) <= 80) {
                    $this->createWorkDayEntries($user->id, $currentDate->copy());
                }
<<<<<<< HEAD
<<<<<<< HEAD
                
=======

>>>>>>> c1ac34e (.)
=======
                
>>>>>>> da93016 (.)
                $currentDate->addDay();
            }
        }

        // Create some incomplete work days (for testing validation)
        $this->createIncompleteWorkDays($users->take(2));
    }

    /**
     * Create a complete work day sequence for a user.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param int $userId
     * @param Carbon $date
     */
    private function createWorkDayEntries(int $userId, Carbon $date): void
=======
     */
    private function createWorkDayEntries(int $employeeId, Carbon $date): void
>>>>>>> c1ac34e (.)
=======
     *
     * @param int $userId
     * @param Carbon $date
     */
    private function createWorkDayEntries(int $userId, Carbon $date): void
>>>>>>> da93016 (.)
    {
        // Clock in (8:00-9:30 AM)
        $clockInTime = $date->copy()->setTime(
            rand(8, 9),
            collect([0, 15, 30, 45])->random(),
            0
        );
<<<<<<< HEAD
<<<<<<< HEAD
        
        WorkHour::create([
            'user_id' => $userId,
            'badge_id' => 'EMP' . str_pad((string) $userId, 4, '0', STR_PAD_LEFT),
            'date' => $date->toDateString(),
            'time' => $clockInTime,
            'type' => WorkHour::TYPE_CLOCK_IN,
            'notes' => rand(1, 100) <= 20 ? 'Started work' : null,
=======

=======
        
>>>>>>> da93016 (.)
        WorkHour::create([
            'user_id' => $userId,
            'badge_id' => 'EMP' . str_pad((string) $userId, 4, '0', STR_PAD_LEFT),
            'date' => $date->toDateString(),
            'time' => $clockInTime,
            'type' => WorkHour::TYPE_CLOCK_IN,
            'notes' => rand(1, 100) <= 20 ? 'Started work' : null,
<<<<<<< HEAD
            'status' => 'approved',
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
        ]);

        // Break start (12:00-1:00 PM)
        $breakStartTime = $clockInTime->copy()->addHours(rand(3, 5))->addMinutes(rand(0, 30));
        WorkHour::create([
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
            'user_id' => $userId,
            'badge_id' => 'EMP' . str_pad((string) $userId, 4, '0', STR_PAD_LEFT),
            'date' => $date->toDateString(),
            'time' => $breakStartTime,
            'type' => WorkHour::TYPE_BREAK_START,
<<<<<<< HEAD
            'notes' => rand(1, 100) <= 10 ? 'Lunch break' : null,
=======
            'employee_id' => $employeeId,
            'timestamp' => $breakStartTime,
            'type' => 'break_start',
            'notes' => rand(1, 100) <= 10 ? 'Lunch break' : null,
            'status' => 'approved',
>>>>>>> c1ac34e (.)
=======
            'notes' => rand(1, 100) <= 10 ? 'Lunch break' : null,
>>>>>>> da93016 (.)
        ]);

        // Break end (30-60 minutes later)
        $breakEndTime = $breakStartTime->copy()->addMinutes(rand(30, 60));
        WorkHour::create([
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
            'user_id' => $userId,
            'badge_id' => 'EMP' . str_pad((string) $userId, 4, '0', STR_PAD_LEFT),
            'date' => $date->toDateString(),
            'time' => $breakEndTime,
            'type' => WorkHour::TYPE_BREAK_END,
<<<<<<< HEAD
            'notes' => rand(1, 100) <= 10 ? 'Back from lunch' : null,
=======
            'employee_id' => $employeeId,
            'timestamp' => $breakEndTime,
            'type' => 'break_end',
            'notes' => rand(1, 100) <= 10 ? 'Back from lunch' : null,
            'status' => 'approved',
>>>>>>> c1ac34e (.)
=======
            'notes' => rand(1, 100) <= 10 ? 'Back from lunch' : null,
>>>>>>> da93016 (.)
        ]);

        // Clock out (5:00-7:00 PM)
        $clockOutTime = $breakEndTime->copy()->addHours(rand(3, 5))->addMinutes(rand(0, 30));
        WorkHour::create([
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
            'user_id' => $userId,
            'badge_id' => 'EMP' . str_pad((string) $userId, 4, '0', STR_PAD_LEFT),
            'date' => $date->toDateString(),
            'time' => $clockOutTime,
            'type' => WorkHour::TYPE_CLOCK_OUT,
<<<<<<< HEAD
            'notes' => rand(1, 100) <= 20 ? 'End of work day' : null,
=======
            'employee_id' => $employeeId,
            'timestamp' => $clockOutTime,
            'type' => 'clock_out',
            'notes' => rand(1, 100) <= 20 ? 'End of work day' : null,
            'status' => 'approved',
>>>>>>> c1ac34e (.)
=======
            'notes' => rand(1, 100) <= 20 ? 'End of work day' : null,
>>>>>>> da93016 (.)
        ]);
    }

    /**
     * Create some incomplete work days for testing.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param \Illuminate\Support\Collection<int, User> $users
     */
    private function createIncompleteWorkDays($users): void
    {
        foreach ($users as $user) {
            $today = Carbon::today();
            
            // User who clocked in but didn't clock out
            WorkHour::create([
                'user_id' => $user->id,
                'badge_id' => 'EMP' . str_pad((string) $user->id, 4, '0', STR_PAD_LEFT),
                'date' => $today->toDateString(),
                'time' => $today->copy()->setTime(8, 30, 0),
                'type' => WorkHour::TYPE_CLOCK_IN,
                'notes' => 'Current work session',
=======
     * @param  \Illuminate\Support\Collection<int, User>  $users
=======
     * @param \Illuminate\Support\Collection<int, User> $users
>>>>>>> da93016 (.)
     */
    private function createIncompleteWorkDays($users): void
    {
        foreach ($users as $user) {
            $today = Carbon::today();
            
            // User who clocked in but didn't clock out
            WorkHour::create([
                'user_id' => $user->id,
                'badge_id' => 'EMP' . str_pad((string) $user->id, 4, '0', STR_PAD_LEFT),
                'date' => $today->toDateString(),
                'time' => $today->copy()->setTime(8, 30, 0),
                'type' => WorkHour::TYPE_CLOCK_IN,
                'notes' => 'Current work session',
<<<<<<< HEAD
                'status' => 'pending',
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
            ]);

            // User on break
            $yesterday = Carbon::yesterday();
            WorkHour::create([
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
                'user_id' => $user->id,
                'badge_id' => 'EMP' . str_pad((string) $user->id, 4, '0', STR_PAD_LEFT),
                'date' => $yesterday->toDateString(),
                'time' => $yesterday->copy()->setTime(8, 0, 0),
                'type' => WorkHour::TYPE_CLOCK_IN,
<<<<<<< HEAD
            ]);

            WorkHour::create([
                'user_id' => $user->id,
                'badge_id' => 'EMP' . str_pad((string) $user->id, 4, '0', STR_PAD_LEFT),
                'date' => $yesterday->toDateString(),
                'time' => $yesterday->copy()->setTime(12, 0, 0),
                'type' => WorkHour::TYPE_BREAK_START,
                'notes' => 'Extended lunch break',
=======
                'employee_id' => $user->id,
                'timestamp' => $yesterday->copy()->setTime(8, 0, 0),
                'type' => 'clock_in',
                'status' => 'approved',
=======
>>>>>>> da93016 (.)
            ]);

            WorkHour::create([
                'user_id' => $user->id,
                'badge_id' => 'EMP' . str_pad((string) $user->id, 4, '0', STR_PAD_LEFT),
                'date' => $yesterday->toDateString(),
                'time' => $yesterday->copy()->setTime(12, 0, 0),
                'type' => WorkHour::TYPE_BREAK_START,
                'notes' => 'Extended lunch break',
<<<<<<< HEAD
                'status' => 'pending',
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
            ]);
        }
    }
}
