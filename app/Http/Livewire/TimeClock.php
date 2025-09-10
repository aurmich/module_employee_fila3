<?php

declare(strict_types=1);

namespace Modules\Employee\Http\Livewire;

use Carbon\Carbon;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Employee\Enums\WorkHourTypeEnum;
use Modules\Employee\Models\Employee;
use Modules\Employee\Models\WorkHour;

class TimeClock extends Component
{
    public ?Employee $employee = null;

    public string $currentTime = '';

    public string $currentDate = '';

    public string $nextAction = '';

    public string $currentStatus = '';

    public ?WorkHour $lastEntry = null;

<<<<<<< HEAD
    /** @var array<int, array{time:string,type:string}> */
=======
    /** @var array<int, array{id?: int, employee_id: int, type: string, timestamp: string, location_lat?: float|null, location_lng?: float|null, location_name?: string|null, device_info?: array|null, photo_path?: string|null, notes?: string|null, status: string, approved_by?: int|null, approved_at?: string|null, created_at?: string, updated_at?: string}> */
>>>>>>> f143926 (.)
    public array $todayEntries = [];

    public float $workedHours = 0.0;

    public string $notes = '';

    /** @var array<string, string> */
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(?int $employeeId = null): void
    {
        $employee = $employeeId ? Employee::find($employeeId) : (Auth::user()->employee ?? null);
        $this->employee = $employee instanceof Employee ? $employee : null;

        $this->updateTimeAndStatus();
        $this->loadTodayData();
    }

<<<<<<< HEAD
    public function render(): View
=======
    public function render(): \Illuminate\Contracts\View\View
>>>>>>> f143926 (.)
    {
        return view('employee::livewire.time-clock');
    }

    public function updatedNotes(): void
    {
        $this->notes = trim($this->notes);
    }

    public function clockAction(): void
    {
        if (! $this->employee) {
            $this->showNotification('Error', 'Employee not found', 'danger');
            return;
        }

        try {
            $now = Carbon::now();
            if ($now->hour < 6 || $now->hour > 22) {
                $this->showNotification('Outside Working Hours', 'Time clock is only available between 6:00 AM and 10:00 PM', 'warning');
                return;
            }

            if (! WorkHour::isValidNextEntry($this->employee->id, $this->nextAction)) {
                $this->showNotification('Invalid Action', 'This action is not valid based on your current status', 'danger');
                return;
            }

            WorkHour::create([
                'employee_id' => $this->employee->id,
                'badge_id' => $this->employee->employee_code,
                'timestamp' => $now,
                'type' => $this->nextAction,
                'notes' => $this->notes !== '' ? $this->notes : null,
                'status' => 'pending',
            ]);

            $this->notes = '';

            $actionLabel = $this->getActionLabel($this->nextAction);
            $this->showNotification('Success', "Successfully recorded: {$actionLabel}", 'success');

            $this->updateTimeAndStatus();
            $this->loadTodayData();
            $this->dispatch('workHourRecorded');
        } catch (\Throwable $e) {
            $this->showNotification('Error', 'Failed to record time entry: '.$e->getMessage(), 'danger');
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
            $this->nextAction = (string) WorkHour::getNextAction($this->employee->id);
            $this->currentStatus = (string) WorkHour::getCurrentStatus($this->employee->id);
            $this->workedHours = (float) WorkHour::calculateWorkedHours($this->employee->id);
        }
    }

    private function loadTodayData(): void
    {
<<<<<<< HEAD
        if (! $this->employee) {
            $this->todayEntries = [];
            return;
=======
        if ($this->employee) {
            $entries = WorkHour::getTodayEntries($this->employee->id);
            // @phpstan-ignore-next-line assign.propertyType
            $this->todayEntries = $entries->map(function ($entry) {
                return [
                    'id' => $entry->id,
                    'employee_id' => $entry->employee_id,
                    'type' => $entry->type,
                    'timestamp' => $entry->timestamp->toDateTimeString(),
                    'location_lat' => $entry->location_lat,
                    'location_lng' => $entry->location_lng,
                    'location_name' => $entry->location_name,
                    'device_info' => $entry->device_info,
                    'photo_path' => $entry->photo_path,
                    'notes' => $entry->notes,
                    'status' => $entry->status,
                    'approved_by' => $entry->approved_by,
                    'approved_at' => $entry->approved_at?->toDateTimeString(),
                    'created_at' => $entry->created_at?->toDateTimeString(),
                    'updated_at' => $entry->updated_at?->toDateTimeString(),
                ];
            })->toArray();
            $this->workedHours = WorkHour::calculateWorkedHours($this->employee->id);
>>>>>>> f143926 (.)
        }

        $entries = WorkHour::getTodayEntries($this->employee->id);
        /** @var array<int, array{time:string,type:string}> */
        $mappedEntries = $entries->map(function (WorkHour $entry): array {
            return [
                'time' => $entry->timestamp->format('H:i'),
                'type' => (string) $entry->type,
            ];
        })->toArray();
        /** @var array<int, array{time:string,type:string}> $mappedEntries */
        $this->todayEntries = array_values($mappedEntries);
    }

    private function showNotification(string $title, string $body, string $type): void
    {
        Notification::make()
            ->title($title)
            ->body($body)
            ->color($type)
            ->send();
    }

    public function getActionLabel(string $action): string
    {
        return match ($action) {
            WorkHourTypeEnum::CLOCK_IN->value => 'Clock In',
            WorkHourTypeEnum::CLOCK_OUT->value => 'Clock Out',
            WorkHourTypeEnum::BREAK_START->value => 'Start Break',
            WorkHourTypeEnum::BREAK_END->value => 'End Break',
            default => $action,
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
        return match ($this->nextAction) {
            WorkHourTypeEnum::CLOCK_IN->value => 'success',
            WorkHourTypeEnum::CLOCK_OUT->value => 'danger',
            WorkHourTypeEnum::BREAK_START->value => 'warning',
            WorkHourTypeEnum::BREAK_END->value => 'info',
            default => 'primary',
        };
    }

    public function getActionButtonIcon(): string
    {
        return match ($this->nextAction) {
            WorkHourTypeEnum::CLOCK_IN->value => 'heroicon-o-play',
            WorkHourTypeEnum::CLOCK_OUT->value => 'heroicon-o-stop',
            WorkHourTypeEnum::BREAK_START->value => 'heroicon-o-pause',
            WorkHourTypeEnum::BREAK_END->value => 'heroicon-o-play',
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
            WorkHourTypeEnum::CLOCK_IN->value => 'Clock In',
            WorkHourTypeEnum::CLOCK_OUT->value => 'Clock Out',
            WorkHourTypeEnum::BREAK_START->value => 'Break Start',
            WorkHourTypeEnum::BREAK_END->value => 'Break End',
            default => $type,
        };
    }

    public function getEntryTypeColor(string $type): string
    {
        return match ($type) {
            WorkHourTypeEnum::CLOCK_IN->value => 'success',
            WorkHourTypeEnum::CLOCK_OUT->value => 'danger',
            WorkHourTypeEnum::BREAK_START->value => 'warning',
            WorkHourTypeEnum::BREAK_END->value => 'info',
            default => 'gray',
        };
    }
}
