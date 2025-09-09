<?php

declare(strict_types=1);

namespace Modules\Employee\Http\Livewire;

use Carbon\Carbon;
<<<<<<< HEAD
<<<<<<< HEAD
use Livewire\Component;
use Modules\Employee\Models\WorkHour;
use Modules\Employee\Models\Employee;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
=======
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Employee\Enums\WorkHourTypeEnum;
use Modules\Employee\Models\Employee;
use Modules\Employee\Models\WorkHour;
>>>>>>> c1ac34e (.)
=======
use Livewire\Component;
use Modules\Employee\Models\WorkHour;
use Modules\Employee\Models\Employee;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
>>>>>>> da93016 (.)

class TimeClock extends Component
{
    public ?Employee $employee = null;
<<<<<<< HEAD
<<<<<<< HEAD
    public string $currentTime = '';
    public string $currentDate = '';
    public string $nextAction = '';
    public string $currentStatus = '';
    public ?WorkHour $lastEntry = null;
    public $todayEntries = [];
    public float $workedHours = 0.0;
    public string $notes = '';

=======

=======
>>>>>>> da93016 (.)
    public string $currentTime = '';
    public string $currentDate = '';
    public string $nextAction = '';
    public string $currentStatus = '';
    public ?WorkHour $lastEntry = null;
    public $todayEntries = [];
    public float $workedHours = 0.0;
    public string $notes = '';

<<<<<<< HEAD
    /** @var array<string, string> */
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(?int $employeeId = null): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->employee = $employeeId 
            ? Employee::find($employeeId) 
            : (Auth::user()->employee ?? null);
=======
        $employee = $employeeId
            ? Employee::find($employeeId)
            : (Auth::user()->employee ?? null);
        $this->employee = $employee instanceof Employee ? $employee : null;
>>>>>>> c1ac34e (.)
=======
        $this->employee = $employeeId 
            ? Employee::find($employeeId) 
            : (Auth::user()->employee ?? null);
>>>>>>> da93016 (.)
        $this->updateTimeAndStatus();
        $this->loadTodayData();
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function render()
=======
    public function render(): \Illuminate\Contracts\View\View
>>>>>>> c1ac34e (.)
=======
    public function render()
>>>>>>> da93016 (.)
    {
        return view('employee::livewire.time-clock');
    }

    public function updatedNotes(): void
    {
        $this->notes = trim($this->notes);
    }

    public function clockAction(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (!$this->employee) {
            $this->showNotification('Error', 'Employee not found', 'danger');
=======
        if (! $this->employee) {
            $this->showNotification('Error', 'Employee not found', 'danger');

>>>>>>> c1ac34e (.)
=======
        if (!$this->employee) {
            $this->showNotification('Error', 'Employee not found', 'danger');
>>>>>>> da93016 (.)
            return;
        }

        try {
            // Validate working hours (6 AM to 10 PM)
            $now = Carbon::now();
            if ($now->hour < 6 || $now->hour > 22) {
                $this->showNotification(
                    'Outside Working Hours',
                    'Time clock is only available between 6:00 AM and 10:00 PM',
                    'warning'
                );
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
                return;
            }

            // Check if the next action is valid
<<<<<<< HEAD
<<<<<<< HEAD
            if (!WorkHour::isValidNextEntry($this->employee->id, $this->nextAction)) {
=======
            if (! WorkHour::isValidNextEntry($this->employee->id, WorkHourTypeEnum::from($this->nextAction))) {
>>>>>>> c1ac34e (.)
=======
            if (!WorkHour::isValidNextEntry($this->employee->id, $this->nextAction)) {
>>>>>>> da93016 (.)
                $this->showNotification(
                    'Invalid Action',
                    'This action is not valid based on your current status',
                    'danger'
                );
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
                return;
            }

            // Create the work hour entry
            WorkHour::create([
                'employee_id' => $this->employee->id,
                'badge_id' => $this->employee->employee_code,
                'timestamp' => $now,
<<<<<<< HEAD
<<<<<<< HEAD
                'type' => $this->nextAction,
=======
                'type' => WorkHourTypeEnum::from($this->nextAction),
>>>>>>> c1ac34e (.)
=======
                'type' => $this->nextAction,
>>>>>>> da93016 (.)
                'notes' => $this->notes ?: null,
                'status' => 'pending',
            ]);

            // Clear notes after successful entry
            $this->notes = '';

            // Show success notification
<<<<<<< HEAD
<<<<<<< HEAD
            $actionLabel = $this->getActionLabel($this->nextAction);
=======
            $actionLabel = $this->getActionLabel(WorkHourTypeEnum::from($this->nextAction));
>>>>>>> c1ac34e (.)
=======
            $actionLabel = $this->getActionLabel($this->nextAction);
>>>>>>> da93016 (.)
            $this->showNotification(
                'Success',
                "Successfully recorded: {$actionLabel}",
                'success'
            );

            // Refresh data
            $this->updateTimeAndStatus();
            $this->loadTodayData();

            // Emit event to refresh other components
            $this->dispatch('workHourRecorded');

        } catch (\Exception $e) {
            $this->showNotification(
                'Error',
<<<<<<< HEAD
<<<<<<< HEAD
                'Failed to record time entry: ' . $e->getMessage(),
=======
                'Failed to record time entry: '.$e->getMessage(),
>>>>>>> c1ac34e (.)
=======
                'Failed to record time entry: ' . $e->getMessage(),
>>>>>>> da93016 (.)
                'danger'
            );
        }
    }

    public function refreshData(): void
    {
        $this->updateTimeAndStatus();
        $this->loadTodayData();
    }

    private function updateTimeAndStatus(): void
    {
        $now = Carbon::now();
        $this->currentTime = $now->format('H:i:s');
        $this->currentDate = $now->format('d/m/Y');

        if ($this->employee) {
            $this->lastEntry = WorkHour::getLastEntryForEmployee($this->employee->id);
<<<<<<< HEAD
<<<<<<< HEAD
            $this->nextAction = WorkHour::getNextAction($this->employee->id);
=======
            $nextAction = WorkHour::getNextAction($this->employee->id);
            $this->nextAction = $nextAction->value;
>>>>>>> c1ac34e (.)
=======
            $this->nextAction = WorkHour::getNextAction($this->employee->id);
>>>>>>> da93016 (.)
            $this->currentStatus = WorkHour::getCurrentStatus($this->employee->id);
        }
    }

    private function loadTodayData(): void
    {
        if ($this->employee) {
<<<<<<< HEAD
<<<<<<< HEAD
            $this->todayEntries = WorkHour::getTodayEntries($this->employee->id)->toArray();
=======
            $entries = WorkHour::getTodayEntries($this->employee->id);
            /** @var array<int, array{time: string, type: string}> $todayEntries */
            $todayEntries = $entries->map(function (WorkHour $entry) {
                return [
                    'time' => $entry->timestamp->format('H:i'),
                    'type' => $entry->type->value,
                ];
            })->toArray();
            $this->todayEntries = $todayEntries;
>>>>>>> c1ac34e (.)
=======
            $this->todayEntries = WorkHour::getTodayEntries($this->employee->id)->toArray();
>>>>>>> da93016 (.)
            $this->workedHours = WorkHour::calculateWorkedHours($this->employee->id);
        }
    }

    private function showNotification(string $title, string $body, string $type): void
    {
        Notification::make()
            ->title($title)
            ->body($body)
            ->color($type)
            ->send();
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getActionLabel(string $action): string
    {
        return match ($action) {
            WorkHour::TYPE_CLOCK_IN => 'Clock In',
            WorkHour::TYPE_CLOCK_OUT => 'Clock Out',
            WorkHour::TYPE_BREAK_START => 'Start Break',
            WorkHour::TYPE_BREAK_END => 'End Break',
            default => $action,
=======
    public function getActionLabel(WorkHourTypeEnum $action): string
    {
        return (string) match ($action) {
            WorkHourTypeEnum::CLOCK_IN => 'Clock In',
            WorkHourTypeEnum::CLOCK_OUT => 'Clock Out',
            WorkHourTypeEnum::BREAK_START => 'Start Break',
            WorkHourTypeEnum::BREAK_END => 'End Break',
            default => $action->value,
>>>>>>> c1ac34e (.)
=======
    public function getActionLabel(string $action): string
    {
        return match ($action) {
            WorkHour::TYPE_CLOCK_IN => 'Clock In',
            WorkHour::TYPE_CLOCK_OUT => 'Clock Out',
            WorkHour::TYPE_BREAK_START => 'Start Break',
            WorkHour::TYPE_BREAK_END => 'End Break',
            default => $action,
>>>>>>> da93016 (.)
        };
    }

    public function getStatusLabel(): string
    {
        return match ($this->currentStatus) {
            'not_clocked_in' => 'Not Clocked In',
            'clocked_in' => 'Clocked In',
            'on_break' => 'On Break',
            'clocked_out' => 'Clocked Out',
            default => 'Unknown',
        };
    }

    public function getStatusColor(): string
    {
        return match ($this->currentStatus) {
            'not_clocked_in' => 'gray',
            'clocked_in' => 'green',
            'on_break' => 'orange',
            'clocked_out' => 'red',
            default => 'gray',
        };
    }

    public function getActionButtonColor(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
        return match ($this->nextAction) {
            WorkHour::TYPE_CLOCK_IN => 'success',
            WorkHour::TYPE_CLOCK_OUT => 'danger',
            WorkHour::TYPE_BREAK_START => 'warning',
            WorkHour::TYPE_BREAK_END => 'info',
<<<<<<< HEAD
=======
        return match (WorkHourTypeEnum::from($this->nextAction)) {
            WorkHourTypeEnum::CLOCK_IN => 'success',
            WorkHourTypeEnum::CLOCK_OUT => 'danger',
            WorkHourTypeEnum::BREAK_START => 'warning',
            WorkHourTypeEnum::BREAK_END => 'info',
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
            default => 'primary',
        };
    }

    public function getActionButtonIcon(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
        return match ($this->nextAction) {
            WorkHour::TYPE_CLOCK_IN => 'heroicon-o-play',
            WorkHour::TYPE_CLOCK_OUT => 'heroicon-o-stop',
            WorkHour::TYPE_BREAK_START => 'heroicon-o-pause',
            WorkHour::TYPE_BREAK_END => 'heroicon-o-play',
<<<<<<< HEAD
=======
        return match (WorkHourTypeEnum::from($this->nextAction)) {
            WorkHourTypeEnum::CLOCK_IN => 'heroicon-o-play',
            WorkHourTypeEnum::CLOCK_OUT => 'heroicon-o-stop',
            WorkHourTypeEnum::BREAK_START => 'heroicon-o-pause',
            WorkHourTypeEnum::BREAK_END => 'heroicon-o-play',
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
            default => 'heroicon-o-clock',
        };
    }

    public function formatTime(string $time): string
    {
        return Carbon::parse($time)->format('H:i:s');
    }

    public function formatEntryType(string $type): string
    {
        return match ($type) {
            WorkHour::TYPE_CLOCK_IN => 'Clock In',
            WorkHour::TYPE_CLOCK_OUT => 'Clock Out',
            WorkHour::TYPE_BREAK_START => 'Break Start',
            WorkHour::TYPE_BREAK_END => 'Break End',
            default => $type,
        };
    }

    public function getEntryTypeColor(string $type): string
    {
        return match ($type) {
            WorkHour::TYPE_CLOCK_IN => 'success',
            WorkHour::TYPE_CLOCK_OUT => 'danger',
            WorkHour::TYPE_BREAK_START => 'warning',
            WorkHour::TYPE_BREAK_END => 'info',
            default => 'gray',
        };
    }
}
