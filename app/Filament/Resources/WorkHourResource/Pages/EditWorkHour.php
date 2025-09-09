<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources\WorkHourResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Actions;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Employee\Filament\Resources\WorkHourResource;
use Modules\Employee\Models\WorkHour;
use Filament\Notifications\Notification;
use Carbon\Carbon;
=======
use Carbon\Carbon;
=======
>>>>>>> da93016 (.)
use Filament\Actions;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Employee\Filament\Resources\WorkHourResource;
use Modules\Employee\Models\WorkHour;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
>>>>>>> c1ac34e (.)
=======
use Filament\Notifications\Notification;
use Carbon\Carbon;
>>>>>>> da93016 (.)

class EditWorkHour extends XotBaseEditRecord
{
    protected static string $resource = WorkHourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    protected function getRedirectUrl(): string
    {
=======
    protected function getRedirectUrl(): ?string
    {
        /** @var string */
>>>>>>> c1ac34e (.)
=======
    protected function getRedirectUrl(): string
    {
>>>>>>> da93016 (.)
        return $this->getResource()::getUrl('index');
    }

    protected function beforeSave(): void
    {
        $data = $this->form->getState();
        $currentRecord = $this->record;
<<<<<<< HEAD
<<<<<<< HEAD
        
        // Skip validation if no changes to critical fields
        if (
            $currentRecord->employee_id === $data['employee_id'] &&
            $currentRecord->type === $data['type'] &&
            $currentRecord->timestamp->eq(Carbon::parse($data['timestamp']))
=======

        // Ensure we have a WorkHour record
        if (! ($currentRecord instanceof WorkHour)) {
            throw new \InvalidArgumentException('Expected WorkHour record');
        }

        // Validate and cast form data
        $timestampValue = $data['timestamp'] ?? null;
        if (! is_string($timestampValue) && ! ($timestampValue instanceof \DateTimeInterface)) {
            throw new \InvalidArgumentException('Invalid timestamp format');
        }

        $employeeIdValue = $data['employee_id'] ?? null;
        if (! is_numeric($employeeIdValue)) {
            throw new \InvalidArgumentException('Invalid employee ID');
        }
        $employeeId = (int) $employeeIdValue;

        $newTimestamp = Carbon::parse($timestampValue);

=======
        
>>>>>>> da93016 (.)
        // Skip validation if no changes to critical fields
        if (
            $currentRecord->employee_id === $data['employee_id'] &&
            $currentRecord->type === $data['type'] &&
<<<<<<< HEAD
            $currentRecord->timestamp->eq($newTimestamp)
>>>>>>> c1ac34e (.)
=======
            $currentRecord->timestamp->eq(Carbon::parse($data['timestamp']))
>>>>>>> da93016 (.)
        ) {
            return;
        }

        // Check for duplicate entries within the same minute (excluding current record)
<<<<<<< HEAD
<<<<<<< HEAD
        $timestamp = Carbon::parse($data['timestamp']);
        $existingEntry = WorkHour::where('employee_id', $data['employee_id'])
            ->where('timestamp', $timestamp)
=======
        /** @var WorkHour|null $existingEntry */
        $existingEntry = WorkHour::query()
            ->where('employee_id', $employeeId)
            ->where('timestamp', $newTimestamp)
>>>>>>> c1ac34e (.)
=======
        $timestamp = Carbon::parse($data['timestamp']);
        $existingEntry = WorkHour::where('employee_id', $data['employee_id'])
            ->where('timestamp', $timestamp)
>>>>>>> da93016 (.)
            ->where('type', $data['type'])
            ->where('id', '!=', $currentRecord->id)
            ->first();

        if ($existingEntry) {
            Notification::make()
                ->title('Duplicate Entry')
                ->body('An entry with the same timestamp and type already exists for this employee.')
                ->danger()
                ->send();

            $this->halt();
        }

        // Validate working hours (6 AM to 10 PM)
<<<<<<< HEAD
<<<<<<< HEAD
        if ($timestamp->hour < 6 || $timestamp->hour > 22) {
=======
        if ($newTimestamp->hour < 6 || $newTimestamp->hour > 22) {
>>>>>>> c1ac34e (.)
=======
        if ($timestamp->hour < 6 || $timestamp->hour > 22) {
>>>>>>> da93016 (.)
            Notification::make()
                ->title('Invalid Time')
                ->body('Work hours must be between 6:00 AM and 10:00 PM.')
                ->warning()
                ->send();

            $this->halt();
        }
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Work hour entry updated successfully';
    }
}
