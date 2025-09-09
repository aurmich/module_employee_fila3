<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources\WorkHourResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Carbon\Carbon;
use Filament\Actions;
use Filament\Notifications\Notification;
use Modules\Employee\Filament\Resources\WorkHourResource;
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
=======
=======
use Carbon\Carbon;
>>>>>>> 6229c57 (.)
use Filament\Actions;
use Filament\Notifications\Notification;
use Modules\Employee\Filament\Resources\WorkHourResource;
use Modules\Employee\Models\WorkHour;
<<<<<<< HEAD
use Filament\Notifications\Notification;
use Carbon\Carbon;
>>>>>>> 95b3a4c (.)
=======
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
>>>>>>> 6229c57 (.)

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
    protected function getRedirectUrl(): ?string
    {
        /** @var string */
=======
    protected function getRedirectUrl(): string
    {
>>>>>>> 95b3a4c (.)
=======
    protected function getRedirectUrl(): ?string
    {
        /** @var string */
>>>>>>> 6229c57 (.)
        return $this->getResource()::getUrl('index');
    }

    protected function beforeSave(): void
    {
        $data = $this->form->getState();
        $currentRecord = $this->record;
<<<<<<< HEAD
<<<<<<< HEAD
=======
        
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

>>>>>>> 6229c57 (.)
        // Skip validation if no changes to critical fields
        if (
            $currentRecord instanceof WorkHour &&
            $currentRecord->employee_id === $data['employee_id'] &&
            $currentRecord->type === $data['type'] &&
            $currentRecord->timestamp->eq(Carbon::parse((string) ($data['timestamp'] ?? '')))
        ) {
            return;
        }
>>>>>>> 95b3a4c (.)

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

<<<<<<< HEAD
        $newTimestamp = Carbon::parse($timestampValue);

        // Skip validation if no changes to critical fields
        if (
            $currentRecord->employee_id === $employeeId &&
=======
        $newTimestamp = Carbon::parse(is_string($timestampValue) ? $timestampValue : $timestampValue->format('Y-m-d H:i:s'));

        
        // Skip validation if no changes to critical fields
        if (
            $currentRecord->employee_id === $data['employee_id'] &&
>>>>>>> 95b3a4c (.)
            $currentRecord->type === $data['type'] &&
            $currentRecord->timestamp->eq($newTimestamp)
        ) {
            return;
        }

        // Check for duplicate entries within the same minute (excluding current record)
<<<<<<< HEAD
        /** @var WorkHour|null $existingEntry */
        $existingEntry = WorkHour::query()
            ->where('employee_id', $employeeId)
=======
        $existingEntry = WorkHour::where('employee_id', $data['employee_id'])
>>>>>>> 95b3a4c (.)
            ->where('timestamp', $newTimestamp)
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
        if ($newTimestamp->hour < 6 || $newTimestamp->hour > 22) {
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
