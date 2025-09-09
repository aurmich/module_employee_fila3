<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources\WorkHourResource\Pages;

<<<<<<< HEAD
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
use Modules\Employee\Filament\Resources\WorkHourResource;
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
=======
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Employee\Filament\Resources\WorkHourResource;
use Modules\Employee\Models\WorkHour;
use Modules\Employee\Enums\WorkHourTypeEnum;
use Modules\Employee\Enums\WorkHourStatusEnum;
use Filament\Notifications\Notification;
use Carbon\Carbon;
>>>>>>> 95b3a4c (.)

class CreateWorkHour extends XotBaseCreateRecord
{
    protected static string $resource = WorkHourResource::class;

    protected function getRedirectUrl(): string
    {
        /** @var string */
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set default status if not provided
<<<<<<< HEAD
        if (! isset($data['status'])) {
=======
        if (!isset($data['status'])) {
>>>>>>> 95b3a4c (.)
            $data['status'] = WorkHourStatusEnum::PENDING->value;
        }

        return $data;
    }

    protected function beforeCreate(): void
    {
        $data = $this->form->getState();
<<<<<<< HEAD

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
=======
        
        // Validate if this entry is allowed based on the last entry
        $timestamp = Carbon::parse((string) ($data['timestamp'] ?? ''));
        $employeeId = (int) ($data['employee_id'] ?? 0);
        $lastEntry = WorkHour::getLastEntryForEmployee($employeeId, $timestamp);
        $expectedAction = WorkHour::getNextAction($employeeId, $timestamp);
        
        if ($data['type'] !== $expectedAction) {
            $lastEntryType = $lastEntry ? match ($lastEntry->type) {
                WorkHourTypeEnum::CLOCK_IN->value => 'Clock In',
                WorkHourTypeEnum::CLOCK_OUT->value => 'Clock Out',
                WorkHourTypeEnum::BREAK_START->value => 'Break Start',
                WorkHourTypeEnum::BREAK_END->value => 'Break End',
                default => $lastEntry->type,
            } : 'None';
            
            $expectedActionLabel = match ($expectedAction) {
                WorkHourTypeEnum::CLOCK_IN->value => 'Clock In',
                WorkHourTypeEnum::CLOCK_OUT->value => 'Clock Out',
                WorkHourTypeEnum::BREAK_START->value => 'Break Start',
                WorkHourTypeEnum::BREAK_END->value => 'Break End',
                default => $expectedAction,
>>>>>>> 95b3a4c (.)
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
        /** @var WorkHour|null $existingEntry */
        $existingEntry = WorkHour::query()
            ->where('employee_id', $employeeId)
=======
        $existingEntry = WorkHour::where('employee_id', $data['employee_id'])
>>>>>>> 95b3a4c (.)
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
