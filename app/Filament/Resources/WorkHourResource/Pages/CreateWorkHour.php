<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources\WorkHourResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Employee\Filament\Resources\WorkHourResource;
use Modules\Employee\Models\WorkHour;
use Filament\Notifications\Notification;
use Carbon\Carbon;
=======
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
use Modules\Employee\Filament\Resources\WorkHourResource;
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
>>>>>>> c1ac34e (.)

class CreateWorkHour extends XotBaseCreateRecord
{
    protected static string $resource = WorkHourResource::class;

    protected function getRedirectUrl(): string
    {
<<<<<<< HEAD
=======
        /** @var string */
>>>>>>> c1ac34e (.)
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set default status if not provided
<<<<<<< HEAD
        if (!isset($data['status'])) {
            $data['status'] = WorkHour::STATUS_PENDING;
=======
        if (! isset($data['status'])) {
            $data['status'] = WorkHourStatusEnum::PENDING->value;
>>>>>>> c1ac34e (.)
        }

        return $data;
    }

    protected function beforeCreate(): void
    {
        $data = $this->form->getState();
<<<<<<< HEAD
        
        // Validate if this entry is allowed based on the last entry
        $timestamp = Carbon::parse($data['timestamp']);
        $lastEntry = WorkHour::getLastEntryForEmployee($data['employee_id'], $timestamp);
        $expectedAction = WorkHour::getNextAction($data['employee_id'], $timestamp);
        
        if ($data['type'] !== $expectedAction) {
            $lastEntryType = $lastEntry ? match ($lastEntry->type) {
                WorkHour::TYPE_CLOCK_IN => 'Clock In',
                WorkHour::TYPE_CLOCK_OUT => 'Clock Out',
                WorkHour::TYPE_BREAK_START => 'Break Start',
                WorkHour::TYPE_BREAK_END => 'Break End',
                default => $lastEntry->type,
            } : 'None';
            
            $expectedActionLabel = match ($expectedAction) {
                WorkHour::TYPE_CLOCK_IN => 'Clock In',
                WorkHour::TYPE_CLOCK_OUT => 'Clock Out',
                WorkHour::TYPE_BREAK_START => 'Break Start',
                WorkHour::TYPE_BREAK_END => 'Break End',
                default => $expectedAction,
=======

        // Validate if this entry is allowed based on the last entry
        $timestampValue = $data['timestamp'] ?? null;
        if (! is_string($timestampValue) && ! ($timestampValue instanceof \DateTimeInterface)) {
            throw new \InvalidArgumentException('Invalid timestamp format');
        }

        $employeeIdValue = $data['employee_id'] ?? null;
        if (! is_numeric($employeeIdValue)) {
            throw new \InvalidArgumentException('Invalid employee ID');
        }
        $employeeId = (int) $employeeIdValue;

        $timestamp = Carbon::parse($timestampValue);
        $lastEntry = WorkHour::getLastEntryForEmployee($employeeId, $timestamp);
        $expectedAction = WorkHour::getNextAction($employeeId, $timestamp);

        if ($data['type'] !== $expectedAction->value) {
            $lastEntryType = $lastEntry ? (string) match ($lastEntry->type) {
                WorkHourTypeEnum::CLOCK_IN => 'Clock In',
                WorkHourTypeEnum::CLOCK_OUT => 'Clock Out',
                WorkHourTypeEnum::BREAK_START => 'Break Start',
                WorkHourTypeEnum::BREAK_END => 'Break End',
            } : 'None';

            $expectedActionLabel = (string) match ($expectedAction) {
                WorkHourTypeEnum::CLOCK_IN => 'Clock In',
                WorkHourTypeEnum::CLOCK_OUT => 'Clock Out',
                WorkHourTypeEnum::BREAK_START => 'Break Start',
                WorkHourTypeEnum::BREAK_END => 'Break End',
>>>>>>> c1ac34e (.)
            };

            Notification::make()
                ->title('Invalid Entry Sequence')
                ->body("Last entry was: {$lastEntryType}. Expected next action: {$expectedActionLabel}")
                ->danger()
                ->send();

            $this->halt();
        }

        // Check for duplicate entries within the same minute
<<<<<<< HEAD
        $existingEntry = WorkHour::where('employee_id', $data['employee_id'])
=======
        /** @var WorkHour|null $existingEntry */
        $existingEntry = WorkHour::query()
            ->where('employee_id', $employeeId)
>>>>>>> c1ac34e (.)
            ->where('timestamp', $timestamp)
            ->where('type', $data['type'])
            ->first();

        if ($existingEntry) {
            Notification::make()
                ->title('Duplicate Entry')
                ->body('An entry with the same timestamp and type already exists for this employee.')
                ->danger()
                ->send();

            $this->halt();
        }
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Work hour entry created successfully';
    }
}
