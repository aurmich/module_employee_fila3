<?php

declare(strict_types=1);

namespace Modules\Employee\Tests\Unit\Models;

<<<<<<< HEAD
use Carbon\Carbon;
use Modules\Employee\Models\Employee;
use Modules\Employee\Models\WorkHour;
=======
use Modules\Employee\Models\WorkHour;
use Modules\Employee\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Carbon\Carbon;

uses(TestCase::class, RefreshDatabase::class);

uses(TestCase::class, RefreshDatabase::class);
>>>>>>> 95b3a4c (.)

beforeEach(function () {
    $this->employee = Employee::factory()->create();
    $this->workHour = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'type' => WorkHour::TYPE_CLOCK_IN,
        'timestamp' => now(),
    ]);
});

test('work hour can be created', function () {
    expect($this->workHour)->toBeInstanceOf(WorkHour::class);
});

test('work hour has fillable attributes', function () {
    $fillable = $this->workHour->getFillable();
<<<<<<< HEAD

=======
    

    
>>>>>>> 95b3a4c (.)
    expect($fillable)->toContain('employee_id');
    expect($fillable)->toContain('type');
    expect($fillable)->toContain('timestamp');
    expect($fillable)->toContain('location_lat');
    expect($fillable)->toContain('location_lng');
    expect($fillable)->toContain('status');
});

test('work hour has casts defined', function () {
    $casts = $this->workHour->getCasts();
<<<<<<< HEAD

=======
    

    
>>>>>>> 95b3a4c (.)
    expect($casts)->toHaveKey('created_at');
    expect($casts)->toHaveKey('updated_at');
    expect($casts)->toHaveKey('timestamp');
    expect($casts)->toHaveKey('approved_at');
    expect($casts)->toHaveKey('device_info');
});

test('work hour has proper table name', function () {
<<<<<<< HEAD
    expect($this->workHour->getTable())->toBe('work_hours');
=======
    expect($this->workHour->getTable())->toBe('time_entries');
    expect($this->workHour->getTable())->toBe('work_hours');
    expect($this->workHour->getTable())->toBe('time_entries');
>>>>>>> 95b3a4c (.)
});

test('work hour belongs to employee', function () {
    expect($this->workHour->employee())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class);
});

test('work hour can be filtered by type', function () {
    $clockIn = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'type' => WorkHour::TYPE_CLOCK_IN,
        'timestamp' => now(),
    ]);
<<<<<<< HEAD

=======
    

    
>>>>>>> 95b3a4c (.)
    $clockOut = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'type' => WorkHour::TYPE_CLOCK_OUT,
        'timestamp' => now()->addHours(8),
    ]);
<<<<<<< HEAD

    $clockIns = WorkHour::ofType(WorkHour::TYPE_CLOCK_IN)->get();
    $clockOuts = WorkHour::ofType(WorkHour::TYPE_CLOCK_OUT)->get();

    expect($clockIns)->toHaveCount(1);
    expect($clockIns->first()->id)->toBe($clockIn->id);

=======
    
    $clockIns = WorkHour::ofType(WorkHour::TYPE_CLOCK_IN)->get();
    $clockOuts = WorkHour::ofType(WorkHour::TYPE_CLOCK_OUT)->get();
    
    expect($clockIns)->toHaveCount(1);
    expect($clockIns->first()->id)->toBe($clockIn->id);
    

    
    $clockIns = WorkHour::ofType(WorkHour::TYPE_CLOCK_IN)->get();
    $clockOuts = WorkHour::ofType(WorkHour::TYPE_CLOCK_OUT)->get();
    
    expect($clockIns)->toHaveCount(1);
    expect($clockIns->first()->id)->toBe($clockIn->id);

    
>>>>>>> 95b3a4c (.)
    expect($clockOuts)->toHaveCount(1);
    expect($clockOuts->first()->id)->toBe($clockOut->id);
});

test('work hour can be filtered by date', function () {
    $today = now();
    $yesterday = now()->subDay();
<<<<<<< HEAD

=======
    

    
>>>>>>> 95b3a4c (.)
    $todayWorkHour = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'timestamp' => $today,
    ]);
<<<<<<< HEAD

=======
    

    
>>>>>>> 95b3a4c (.)
    $yesterdayWorkHour = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'timestamp' => $yesterday,
    ]);
<<<<<<< HEAD

    $todayWorkHours = WorkHour::forDate($today)->get();

=======
    
    $todayWorkHours = WorkHour::forDate($today)->get();
    

    $todayWorkHours = WorkHour::forDate($today)->get();

    
    $todayWorkHours = WorkHour::forDate($today)->get();
    
>>>>>>> 95b3a4c (.)
    expect($todayWorkHours)->toHaveCount(1);
    expect($todayWorkHours->first()->id)->toBe($todayWorkHour->id);
});

test('work hour can be filtered by employee', function () {
    $employee2 = Employee::factory()->create();
<<<<<<< HEAD

    $workHour1 = WorkHour::factory()->create(['employee_id' => $this->employee->id]);
    $workHour2 = WorkHour::factory()->create(['employee_id' => $employee2->id]);

    $employee1WorkHours = WorkHour::forEmployee($this->employee->id)->get();

=======
    
    $workHour1 = WorkHour::factory()->create(['employee_id' => $this->employee->id]);
    $workHour2 = WorkHour::factory()->create(['employee_id' => $employee2->id]);
    
    $employee1WorkHours = WorkHour::forEmployee($this->employee->id)->get();
    

    
    $workHour1 = WorkHour::factory()->create(['employee_id' => $this->employee->id]);
    $workHour2 = WorkHour::factory()->create(['employee_id' => $employee2->id]);
    
    $employee1WorkHours = WorkHour::forEmployee($this->employee->id)->get();

    
>>>>>>> 95b3a4c (.)
    expect($employee1WorkHours)->toHaveCount(1);
    expect($employee1WorkHours->first()->id)->toBe($workHour1->id);
});

test('work hour has proper relationships', function () {
    expect($this->workHour->employee())->toBeInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class);
});

test('work hour can get formatted time attributes', function () {
    $workHour = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'timestamp' => Carbon::create(2024, 1, 15, 9, 30, 0),
    ]);
<<<<<<< HEAD

=======
    

    
>>>>>>> 95b3a4c (.)
    expect($workHour->formatted_time)->toBe('09:30:00');
    expect($workHour->formatted_date)->toBe('15/01/2024');
    expect($workHour->formatted_date_time)->toBe('15/01/2024 09:30:00');
});

test('work hour can calculate worked hours', function () {
    $clockIn = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'type' => WorkHour::TYPE_CLOCK_IN,
        'timestamp' => now()->subHours(8),
    ]);
<<<<<<< HEAD

=======
    

    
>>>>>>> 95b3a4c (.)
    $clockOut = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'type' => WorkHour::TYPE_CLOCK_OUT,
        'timestamp' => now(),
    ]);
<<<<<<< HEAD

    $workedHours = WorkHour::calculateWorkedHours($this->employee->id);

=======
    
    $workedHours = WorkHour::calculateWorkedHours($this->employee->id);
    

    $workedHours = WorkHour::calculateWorkedHours($this->employee->id);

    
    $workedHours = WorkHour::calculateWorkedHours($this->employee->id);
    
>>>>>>> 95b3a4c (.)
    expect($workedHours)->toBe(8.0);
});

test('work hour can get current status', function () {
    $clockIn = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'type' => WorkHour::TYPE_CLOCK_IN,
        'timestamp' => now()->subHours(1),
    ]);
<<<<<<< HEAD

    $status = WorkHour::getCurrentStatus($this->employee->id);

=======
    
    $status = WorkHour::getCurrentStatus($this->employee->id);
    

    $status = WorkHour::getCurrentStatus($this->employee->id);

    
    $status = WorkHour::getCurrentStatus($this->employee->id);
    
>>>>>>> 95b3a4c (.)
    expect($status)->toBe('clocked_in');
});

test('work hour validates next entry type', function () {
    $clockIn = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'type' => WorkHour::TYPE_CLOCK_IN,
        'timestamp' => now()->subHours(1),
    ]);
<<<<<<< HEAD

    $isValid = WorkHour::isValidNextEntry($this->employee->id, WorkHour::TYPE_CLOCK_OUT);

=======
    
    $isValid = WorkHour::isValidNextEntry($this->employee->id, WorkHour::TYPE_CLOCK_OUT);
    

    $isValid = WorkHour::isValidNextEntry($this->employee->id, WorkHour::TYPE_CLOCK_OUT);

    
    $isValid = WorkHour::isValidNextEntry($this->employee->id, WorkHour::TYPE_CLOCK_OUT);
    
>>>>>>> 95b3a4c (.)
    expect($isValid)->toBeTrue();
});

test('work hour can get today entries', function () {
    $today = now();
<<<<<<< HEAD

=======
    

    
>>>>>>> 95b3a4c (.)
    $workHour1 = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'timestamp' => $today->copy()->setTime(9, 0),
    ]);
<<<<<<< HEAD

=======
    

    
>>>>>>> 95b3a4c (.)
    $workHour2 = WorkHour::factory()->create([
        'employee_id' => $this->employee->id,
        'timestamp' => $today->copy()->setTime(17, 0),
    ]);
<<<<<<< HEAD

    $todayEntries = WorkHour::getTodayEntries($this->employee->id, $today);

=======
    
    $todayEntries = WorkHour::getTodayEntries($this->employee->id, $today);
    

    $todayEntries = WorkHour::getTodayEntries($this->employee->id, $today);

    
    $todayEntries = WorkHour::getTodayEntries($this->employee->id, $today);
    
>>>>>>> 95b3a4c (.)
    expect($todayEntries)->toHaveCount(2);
    expect($todayEntries->first()->id)->toBe($workHour1->id);
    expect($todayEntries->last()->id)->toBe($workHour2->id);
});
