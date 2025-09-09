<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
=======
=======
use Modules\Employee\Enums\WorkHourTypeEnum;
>>>>>>> 6229c57 (.)
use Modules\Employee\Models\Employee;
>>>>>>> 95b3a4c (.)

/**
 * Class WorkHour.
 *
 * @property int $id
 * @property int $employee_id
<<<<<<< HEAD
 * @property WorkHourTypeEnum $type
=======
 * @property string $type
>>>>>>> 95b3a4c (.)
 * @property Carbon $timestamp
 * @property float|null $location_lat
 * @property float|null $location_lng
 * @property string|null $location_name
 * @property array<string, mixed>|null $device_info
 * @property string|null $photo_path
 * @property string|null $notes
<<<<<<< HEAD
 * @property WorkHourStatusEnum $status
=======
 * @property string $status
>>>>>>> 95b3a4c (.)
 * @property int|null $approved_by
 * @property Carbon|null $approved_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read \Modules\User\Models\User|null $approvedBy
<<<<<<< HEAD
 */
class WorkHour extends BaseModel
{
    /**
     * Backward compatibility constants - deprecated, use enum instead.
     *
     * @deprecated Use WorkHourTypeEnum::class instead
     */
    public const TYPE_CLOCK_IN = 'clock_in';

    public const TYPE_CLOCK_OUT = 'clock_out';

    public const TYPE_BREAK_START = 'break_start';

    public const TYPE_BREAK_END = 'break_end';

    /**
     * @deprecated Use WorkHourTypeEnum::class instead
     */
    public const TYPES = [
        'clock_in' => 'clock_in',
        'clock_out' => 'clock_out',
        'break_start' => 'break_start',
        'break_end' => 'break_end',
    ];

    /**
     * @deprecated Use WorkHourStatusEnum::class instead
     */
    public const STATUS_PENDING = 'pending';

    public const STATUS_APPROVED = 'approved';

    public const STATUS_REJECTED = 'rejected';

    /**
     * @deprecated Use WorkHourStatusEnum::class instead
     */
    public const STATUSES = [
        'pending' => 'pending',
        'approved' => 'approved',
        'rejected' => 'rejected',
=======
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read string $formatted_date
 * @property-read string $formatted_date_time
 * @property-read string $formatted_time
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 * @method static Builder<static>|WorkHour forDate(\Carbon\Carbon $date)
 * @method static Builder<static>|WorkHour forEmployee(int $employeeId)
 * @method static Builder<static>|WorkHour newModelQuery()
 * @method static Builder<static>|WorkHour newQuery()
 * @method static Builder<static>|WorkHour ofType(string $type)
 * @method static Builder<static>|WorkHour query()
 * @method static Builder<static>|WorkHour today()
 * @method static Builder<static>|WorkHour whereApprovedAt($value)
 * @method static Builder<static>|WorkHour whereApprovedBy($value)
 * @method static Builder<static>|WorkHour whereCreatedAt($value)
 * @method static Builder<static>|WorkHour whereDeviceInfo($value)
 * @method static Builder<static>|WorkHour whereEmployeeId($value)
 * @method static Builder<static>|WorkHour whereId($value)
 * @method static Builder<static>|WorkHour whereLocationLat($value)
 * @method static Builder<static>|WorkHour whereLocationLng($value)
 * @method static Builder<static>|WorkHour whereLocationName($value)
 * @method static Builder<static>|WorkHour whereNotes($value)
 * @method static Builder<static>|WorkHour wherePhotoPath($value)
 * @method static Builder<static>|WorkHour whereStatus($value)
 * @method static Builder<static>|WorkHour whereTimestamp($value)
 * @method static Builder<static>|WorkHour whereType($value)
 * @method static Builder<static>|WorkHour whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WorkHour extends BaseModel
{
    public const TYPES = [
        WorkHourTypeEnum::CLOCK_IN->value,
        WorkHourTypeEnum::CLOCK_OUT->value,
        WorkHourTypeEnum::BREAK_START->value,
        WorkHourTypeEnum::BREAK_END->value,
    ];

    public const STATUSES = [
        'pending',
        'approved',
        'rejected',
>>>>>>> 95b3a4c (.)
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'work_hours';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'employee_id',
        'type',
        'timestamp',
        'location_lat',
        'location_lng',
        'location_name',
        'device_info',
        'photo_path',
        'notes',
        'status',
        'approved_by',
        'approved_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
<<<<<<< HEAD
            'type' => WorkHourTypeEnum::class,
            'status' => WorkHourStatusEnum::class,
=======
>>>>>>> 95b3a4c (.)
            'timestamp' => 'datetime',
            'location_lat' => 'decimal:8',
            'location_lng' => 'decimal:8',
            'device_info' => 'array',
            'approved_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
<<<<<<< HEAD
<<<<<<< HEAD
=======
            'type' => \Modules\Employee\Enums\WorkHourTypeEnum::class,
            'status' => \Modules\Employee\Enums\WorkHourStatusEnum::class,
>>>>>>> 95b3a4c (.)
=======
>>>>>>> 6229c57 (.)
        ];
    }

    /**
     * Get the employee that owns the work hour record.
     *
     * @return BelongsTo<Employee, $this>
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * Get the user who approved the time entry.
     *
     * @return BelongsTo<\Modules\User\Models\User, $this>
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(\Modules\User\Models\User::class, 'approved_by');
    }

    /**
     * Scope a query to only include work hours for a specific employee.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
=======
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param int $employeeId
>>>>>>> 95b3a4c (.)
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeForEmployee(Builder $query, int $employeeId): Builder
    {
        return $query->where('employee_id', $employeeId);
    }

    /**
     * Scope a query to only include work hours of a specific type.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
=======
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param string $type
>>>>>>> 95b3a4c (.)
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * Scope a query to only include work hours for a specific date.
     *
<<<<<<< HEAD
     * @param  Builder<WorkHour>  $query
     */
    public function scopeForDate(Builder $query, Carbon $date): void
    {
        $query->whereDate('timestamp', $date);
=======
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param Carbon $date
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeForDate(Builder $query, Carbon $date): Builder
    {
        return $query->whereDate('timestamp', $date);
>>>>>>> 95b3a4c (.)
    }

    /**
     * Scope a query to only include work hours for today.
     *
<<<<<<< HEAD
     * @param  Builder<WorkHour>  $query
     */
    public function scopeToday(Builder $query): void
    {
        $query->whereDate('timestamp', Carbon::today());
=======
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('timestamp', Carbon::today());
>>>>>>> 95b3a4c (.)
    }

<<<<<<< HEAD
    /**
     * Get the formatted time.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> 95b3a4c (.)
     */
=======
>>>>>>> 6229c57 (.)
    public function getFormattedTimeAttribute(): string
    {
        return $this->timestamp->format('H:i:s');
    }

<<<<<<< HEAD
    /**
     * Get the formatted date.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> 95b3a4c (.)
     */
=======
>>>>>>> 6229c57 (.)
    public function getFormattedDateAttribute(): string
    {
        return $this->timestamp->format('d/m/Y');
    }

<<<<<<< HEAD
    /**
     * Get the formatted date and time.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> 95b3a4c (.)
     */
=======
>>>>>>> 6229c57 (.)
    public function getFormattedDateTimeAttribute(): string
    {
        return $this->timestamp->format('d/m/Y H:i:s');
    }

<<<<<<< HEAD
    /**
<<<<<<< HEAD
     * Get the last work hour entry for an employee on a specific date.
=======
     * Check if the work hour is a clock in.
     *
     * @return bool
     */
=======
>>>>>>> 6229c57 (.)
    public function isClockIn(): bool
    {
        return $this->type === WorkHourTypeEnum::CLOCK_IN->value;
    }

    public function isClockOut(): bool
    {
        return $this->type === WorkHourTypeEnum::CLOCK_OUT->value;
    }

    public function isBreakStart(): bool
    {
        return $this->type === WorkHourTypeEnum::BREAK_START->value;
    }

    public function isBreakEnd(): bool
    {
        return $this->type === WorkHourTypeEnum::BREAK_END->value;
    }

<<<<<<< HEAD
    /**
     * Get the last work hour entry for an employee on a specific date.
     *
     * @param int $employeeId
     * @param Carbon|null $date
     * @return WorkHour|null
>>>>>>> 95b3a4c (.)
     */
    public static function getLastEntryForEmployee(int $employeeId, ?Carbon $date = null): ?WorkHour
    {
        $date = $date ?? Carbon::today();
<<<<<<< HEAD

        /** @var WorkHour|null */
        return static::query()
            ->where('employee_id', $employeeId)
            ->whereDate('timestamp', $date)
=======
        
=======
    public static function getLastEntryForEmployee(int $employeeId, ?Carbon $date = null): ?WorkHour
    {
        $date = $date ?? Carbon::today();
>>>>>>> 6229c57 (.)
        return static::forEmployee($employeeId)
            ->forDate($date)
>>>>>>> 95b3a4c (.)
            ->orderBy('timestamp', 'desc')
            ->first();
    }

<<<<<<< HEAD
    /**
     * Get the next expected action for an employee based on their last entry.
<<<<<<< HEAD
     */
    public static function getNextAction(int $employeeId, ?Carbon $date = null): WorkHourTypeEnum
    {
        $lastEntry = static::getLastEntryForEmployee($employeeId, $date);

        if (! $lastEntry) {
            return WorkHourTypeEnum::CLOCK_IN;
        }

        return $lastEntry->type->getNextAction();
=======
     *
     * @param int $employeeId
     * @param Carbon|null $date
     * @return string
     */
=======
>>>>>>> 6229c57 (.)
    public static function getNextAction(int $employeeId, ?Carbon $date = null): string
    {
        $lastEntry = static::getLastEntryForEmployee($employeeId, $date);

        if (! $lastEntry) {
            return WorkHourTypeEnum::CLOCK_IN->value;
        }

        return match ($lastEntry->type) {
            WorkHourTypeEnum::CLOCK_IN->value => WorkHourTypeEnum::BREAK_START->value,
            WorkHourTypeEnum::BREAK_START->value => WorkHourTypeEnum::BREAK_END->value,
            WorkHourTypeEnum::BREAK_END->value => WorkHourTypeEnum::CLOCK_OUT->value,
            WorkHourTypeEnum::CLOCK_OUT->value => WorkHourTypeEnum::CLOCK_IN->value,
            default => WorkHourTypeEnum::CLOCK_IN->value,
        };
>>>>>>> 95b3a4c (.)
    }

<<<<<<< HEAD
    /**
     * Validate if a new entry is allowed based on the last entry.
<<<<<<< HEAD
     */
    public static function isValidNextEntry(int $employeeId, WorkHourTypeEnum $type, ?Carbon $date = null): bool
    {
        $expectedAction = static::getNextAction($employeeId, $date);

=======
     *
     * @param int $employeeId
     * @param string $type
     * @param Carbon|null $date
     * @return bool
     */
=======
>>>>>>> 6229c57 (.)
    public static function isValidNextEntry(int $employeeId, string $type, ?Carbon $date = null): bool
    {
        $expectedAction = static::getNextAction($employeeId, $date);
>>>>>>> 95b3a4c (.)
        return $expectedAction === $type;
    }

    /**
<<<<<<< HEAD
     * Get all work hours for an employee on a specific date.
     *
<<<<<<< HEAD
=======
     * @param int $employeeId
     * @param Carbon|null $date
>>>>>>> 95b3a4c (.)
=======
>>>>>>> 6229c57 (.)
     * @return \Illuminate\Database\Eloquent\Collection<int, WorkHour>
     */
    public static function getTodayEntries(int $employeeId, ?Carbon $date = null): \Illuminate\Database\Eloquent\Collection
    {
        $date = $date ?? Carbon::today();
<<<<<<< HEAD
<<<<<<< HEAD

        /** @var \Illuminate\Database\Eloquent\Collection<int, WorkHour> */
        return static::query()
            ->where('employee_id', $employeeId)
            ->whereDate('timestamp', $date)
=======
        
=======

>>>>>>> 6229c57 (.)
        return static::forEmployee($employeeId)
            ->forDate($date)
>>>>>>> 95b3a4c (.)
            ->orderBy('timestamp', 'asc')
            ->get();
    }

<<<<<<< HEAD
    /**
     * Calculate total worked hours for an employee on a specific date.
     *
<<<<<<< HEAD
=======
     * @param int $employeeId
     * @param Carbon|null $date
>>>>>>> 95b3a4c (.)
     * @return float Hours worked
     */
    public static function calculateWorkedHours(int $employeeId, ?Carbon $date = null): float
    {
        $entries = static::getTodayEntries($employeeId, $date);
<<<<<<< HEAD

=======
        
>>>>>>> 95b3a4c (.)
=======
    public static function calculateWorkedHours(int $employeeId, ?Carbon $date = null): float
    {
        $entries = static::getTodayEntries($employeeId, $date);
>>>>>>> 6229c57 (.)
        if ($entries->isEmpty()) {
            return 0.0;
        }

        $totalMinutes = 0;
        $clockInTime = null;

        foreach ($entries as $entry) {
            switch ($entry->type) {
<<<<<<< HEAD
<<<<<<< HEAD
                case WorkHourTypeEnum::CLOCK_IN:
                    $clockInTime = $entry->timestamp;
                    break;

                case WorkHourTypeEnum::BREAK_START:
=======
                case self::TYPE_CLOCK_IN:
                    $clockInTime = $entry->timestamp;
                    break;
                    
                case self::TYPE_BREAK_START:
>>>>>>> 95b3a4c (.)
=======
                case WorkHourTypeEnum::CLOCK_IN->value:
                    $clockInTime = $entry->timestamp;
                    break;

                case WorkHourTypeEnum::BREAK_START->value:
>>>>>>> 6229c57 (.)
                    if ($clockInTime) {
                        $totalMinutes += $clockInTime->diffInMinutes($entry->timestamp);
                    }
                    $clockInTime = null;
                    break;
<<<<<<< HEAD
<<<<<<< HEAD

                case WorkHourTypeEnum::BREAK_END:
                    $clockInTime = $entry->timestamp; // Resume work
                    break;

                case WorkHourTypeEnum::CLOCK_OUT:
=======
                    
                case self::TYPE_BREAK_END:
                    $clockInTime = $entry->timestamp; // Resume work
                    break;
                    
                case self::TYPE_CLOCK_OUT:
>>>>>>> 95b3a4c (.)
=======

                case WorkHourTypeEnum::BREAK_END->value:
                    $clockInTime = $entry->timestamp; // Resume work
                    break;

                case WorkHourTypeEnum::CLOCK_OUT->value:
>>>>>>> 6229c57 (.)
                    if ($clockInTime) {
                        $totalMinutes += $clockInTime->diffInMinutes($entry->timestamp);
                        $clockInTime = null;
                    }
                    break;
            }
        }

        return round($totalMinutes / 60, 2);
    }

<<<<<<< HEAD
    /**
     * Get the current status for an employee.
<<<<<<< HEAD
=======
     *
     * @param int $employeeId
     * @param Carbon|null $date
     * @return string
>>>>>>> 95b3a4c (.)
     */
=======
>>>>>>> 6229c57 (.)
    public static function getCurrentStatus(int $employeeId, ?Carbon $date = null): string
    {
        $lastEntry = static::getLastEntryForEmployee($employeeId, $date);

<<<<<<< HEAD
<<<<<<< HEAD
        if (! $lastEntry) {
=======
        if (!$lastEntry) {
>>>>>>> 95b3a4c (.)
=======
        if (! $lastEntry) {
>>>>>>> 6229c57 (.)
            return 'not_clocked_in';
        }

        return match ($lastEntry->type) {
<<<<<<< HEAD
<<<<<<< HEAD
            WorkHourTypeEnum::CLOCK_IN => 'clocked_in',
            WorkHourTypeEnum::BREAK_START => 'on_break',
            WorkHourTypeEnum::BREAK_END => 'clocked_in',
            WorkHourTypeEnum::CLOCK_OUT => 'clocked_out',
=======
            self::TYPE_CLOCK_IN => 'clocked_in',
            self::TYPE_BREAK_START => 'on_break',
            self::TYPE_BREAK_END => 'clocked_in',
            self::TYPE_CLOCK_OUT => 'clocked_out',
=======
            WorkHourTypeEnum::CLOCK_IN->value => 'clocked_in',
            WorkHourTypeEnum::BREAK_START->value => 'on_break',
            WorkHourTypeEnum::BREAK_END->value => 'clocked_in',
            WorkHourTypeEnum::CLOCK_OUT->value => 'clocked_out',
>>>>>>> 6229c57 (.)
            default => 'not_clocked_in',
>>>>>>> 95b3a4c (.)
        };
    }
}
