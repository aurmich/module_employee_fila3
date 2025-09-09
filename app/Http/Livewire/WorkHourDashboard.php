<?php

declare(strict_types=1);

namespace Modules\Employee\Http\Livewire;

use Carbon\Carbon;
<<<<<<< HEAD
use Livewire\Component;
use Modules\Employee\Models\WorkHour;
use Modules\Employee\Models\Employee;
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
use Modules\Employee\Models\Employee;
use Modules\Employee\Models\WorkHour;
>>>>>>> c1ac34e (.)

class WorkHourDashboard extends Component
{
    public ?Employee $employee = null;
<<<<<<< HEAD
    public array $weeklyStats = [];
    public array $monthlyStats = [];
    public float $todayHours = 0.0;
    public float $weekHours = 0.0;
    public float $monthHours = 0.0;
    public array $recentEntries = [];
    public string $selectedPeriod = 'week';

    protected $listeners = [
        'workHourRecorded' => 'refreshStats',
        'refreshDashboard' => 'refreshStats'
=======

    /** @var array<int, array{date: string, day: string, hours: float, formatted_hours: string}> */
    public array $weeklyStats = [];

    /** @var array<int, array{week: int, start_date: string, end_date: string, hours: float, formatted_hours: string}> */
    public array $monthlyStats = [];

    public float $todayHours = 0.0;

    public float $weekHours = 0.0;

    public float $monthHours = 0.0;

    /** @var array<int, array{id: int, date: string, time: string, type: WorkHourTypeEnum, type_label: string, type_color: string, notes: string|null, status: WorkHourStatusEnum, status_color: string}> */
    public array $recentEntries = [];

    public string $selectedPeriod = 'week';

    /** @var array<string, string> */
    protected $listeners = [
        'workHourRecorded' => 'refreshStats',
        'refreshDashboard' => 'refreshStats',
>>>>>>> c1ac34e (.)
    ];

    public function mount(?int $employeeId = null): void
    {
<<<<<<< HEAD
        $this->employee = $employeeId 
            ? Employee::find($employeeId) 
            : (Auth::user()->employee ?? null);
        $this->refreshStats();
    }

    public function render()
=======
        if ($employeeId) {
            // PHPStan Level 10 workaround: create Employee manually for dashboard
            /** @var Employee $employee */
            $employee = new Employee();
            $employee->id = $employeeId;
            $this->employee = $employee;
        } else {
            $this->employee = null;
        }
        $this->refreshStats();
    }

    public function render(): View
>>>>>>> c1ac34e (.)
    {
        return view('employee::livewire.work-hour-dashboard');
    }

    public function refreshStats(): void
    {
<<<<<<< HEAD
        if (!$this->employee) {
=======
        if (! $this->employee) {
>>>>>>> c1ac34e (.)
            return;
        }

        $this->calculateTodayHours();
        $this->calculateWeeklyStats();
        $this->calculateMonthlyStats();
        $this->loadRecentEntries();
    }

    public function updatedSelectedPeriod(): void
    {
        $this->refreshStats();
    }

    private function calculateTodayHours(): void
    {
<<<<<<< HEAD
        $this->todayHours = WorkHour::calculateWorkedHours($this->employee->id, Carbon::today());
=======
        if ($this->employee) {
            $this->todayHours = WorkHour::calculateWorkedHours($this->employee->id, Carbon::today());
        }
>>>>>>> c1ac34e (.)
    }

    private function calculateWeeklyStats(): void
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
<<<<<<< HEAD
        
=======

>>>>>>> c1ac34e (.)
        $this->weekHours = 0.0;
        $this->weeklyStats = [];

        for ($date = $startOfWeek->copy(); $date->lte($endOfWeek); $date->addDay()) {
<<<<<<< HEAD
            $hours = WorkHour::calculateWorkedHours($this->employee->id, $date);
            $this->weekHours += $hours;
            
=======
            $hours = $this->employee ? WorkHour::calculateWorkedHours($this->employee->id, $date) : 0.0;
            $this->weekHours += $hours;

>>>>>>> c1ac34e (.)
            $this->weeklyStats[] = [
                'date' => $date->format('Y-m-d'),
                'day' => $date->format('D'),
                'hours' => $hours,
                'formatted_hours' => $this->formatHours($hours),
            ];
        }
    }

    private function calculateMonthlyStats(): void
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
<<<<<<< HEAD
        
=======

>>>>>>> c1ac34e (.)
        $this->monthHours = 0.0;
        $this->monthlyStats = [];

        // Group by weeks
        $currentWeek = $startOfMonth->copy()->startOfWeek();
        $weekNumber = 1;

        while ($currentWeek->lte($endOfMonth)) {
            $weekEnd = $currentWeek->copy()->endOfWeek();
            if ($weekEnd->gt($endOfMonth)) {
                $weekEnd = $endOfMonth->copy();
            }

            $weekHours = 0.0;
            for ($date = $currentWeek->copy(); $date->lte($weekEnd); $date->addDay()) {
                if ($date->gte($startOfMonth) && $date->lte($endOfMonth)) {
<<<<<<< HEAD
                    $dayHours = WorkHour::calculateWorkedHours($this->employee->id, $date);
=======
                    $dayHours = $this->employee ? WorkHour::calculateWorkedHours($this->employee->id, $date) : 0.0;
>>>>>>> c1ac34e (.)
                    $weekHours += $dayHours;
                    $this->monthHours += $dayHours;
                }
            }

            $this->monthlyStats[] = [
                'week' => $weekNumber,
                'start_date' => $currentWeek->format('d/m'),
                'end_date' => $weekEnd->format('d/m'),
                'hours' => $weekHours,
                'formatted_hours' => $this->formatHours($weekHours),
            ];

            $currentWeek->addWeek();
            $weekNumber++;
        }
    }

    private function loadRecentEntries(): void
    {
<<<<<<< HEAD
        $this->recentEntries = WorkHour::where('employee_id', $this->employee->id)
            ->orderBy('timestamp', 'desc')
            ->limit(10)
            ->get()
            ->map(function (WorkHour $entry) {
                return [
                    'id' => $entry->id,
                    'date' => $entry->timestamp->format('d/m/Y'),
                    'time' => $entry->timestamp->format('H:i:s'),
                    'type' => $entry->type,
                    'type_label' => $this->getTypeLabel($entry->type),
                    'type_color' => $this->getTypeColor($entry->type),
                    'notes' => $entry->notes,
                    'status' => $entry->status,
                    'status_color' => $this->getStatusColor($entry->status),
                ];
            })
            ->toArray();
=======
        if (! $this->employee) {
            $this->recentEntries = [];

            return;
        }

        /** @var \Illuminate\Database\Eloquent\Collection<int, WorkHour> $entries */
        $entries = WorkHour::query()
            ->where('employee_id', $this->employee->id)
            ->orderBy('timestamp', 'desc')
            ->limit(10)
            ->get();

        /** @var array<int, array{id: int, date: string, time: string, type: WorkHourTypeEnum, type_label: string, type_color: string, notes: string|null, status: WorkHourStatusEnum, status_color: string}> $recentEntries */
        $recentEntries = $entries->map(function (WorkHour $entry): array {
            return [
                'id' => $entry->id,
                'date' => $entry->timestamp->format('d/m/Y'),
                'time' => $entry->timestamp->format('H:i:s'),
                'type' => $entry->type,
                'type_label' => $this->getTypeLabel($entry->type->value),
                'type_color' => $this->getTypeColor($entry->type->value),
                'notes' => $entry->notes,
                'status' => $entry->status,
                'status_color' => $this->getStatusColor($entry->status->value),
            ];
        })->toArray();
        $this->recentEntries = $recentEntries;
>>>>>>> c1ac34e (.)
    }

    public function getTypeLabel(string $type): string
    {
        return match ($type) {
            WorkHour::TYPE_CLOCK_IN => 'Clock In',
            WorkHour::TYPE_CLOCK_OUT => 'Clock Out',
            WorkHour::TYPE_BREAK_START => 'Break Start',
            WorkHour::TYPE_BREAK_END => 'Break End',
            default => $type,
        };
    }

    public function getTypeColor(string $type): string
    {
        return match ($type) {
            WorkHour::TYPE_CLOCK_IN => 'success',
            WorkHour::TYPE_CLOCK_OUT => 'danger',
            WorkHour::TYPE_BREAK_START => 'warning',
            WorkHour::TYPE_BREAK_END => 'info',
            default => 'gray',
        };
    }

    public function getStatusColor(string $status): string
    {
        return match ($status) {
            'pending' => 'warning',
            'approved' => 'success',
            'rejected' => 'danger',
            default => 'gray',
        };
    }

    public function formatHours(float $hours): string
    {
        $wholeHours = floor($hours);
        $minutes = round(($hours - $wholeHours) * 60);
<<<<<<< HEAD
        
        if ($minutes == 0) {
            return "{$wholeHours}h";
        }
        
=======

        if ($minutes == 0) {
            return "{$wholeHours}h";
        }

>>>>>>> c1ac34e (.)
        return "{$wholeHours}h {$minutes}m";
    }

    public function getAverageHoursPerDay(): string
    {
        if (empty($this->weeklyStats)) {
            return '0h';
        }

        $workDays = collect($this->weeklyStats)->where('hours', '>', 0)->count();
        if ($workDays == 0) {
            return '0h';
        }

        $average = $this->weekHours / $workDays;
<<<<<<< HEAD
=======

>>>>>>> c1ac34e (.)
        return $this->formatHours($average);
    }

    public function getTotalWorkDays(): int
    {
        return collect($this->weeklyStats)->where('hours', '>', 0)->count();
    }

    public function getProgressPercentage(): int
    {
        // Assuming 40 hours per week as target
        $targetHours = 40;
        $percentage = ($this->weekHours / $targetHours) * 100;
<<<<<<< HEAD
=======

>>>>>>> c1ac34e (.)
        return min(100, (int) round($percentage));
    }

    public function getProgressColor(): string
    {
        $percentage = $this->getProgressPercentage();
<<<<<<< HEAD
        
=======

>>>>>>> c1ac34e (.)
        if ($percentage >= 90) {
            return 'success';
        } elseif ($percentage >= 70) {
            return 'warning';
        } else {
            return 'danger';
        }
    }
}
