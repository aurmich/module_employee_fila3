<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> 5098881 (.)
use Modules\Employee\Enums\WorkHourTypeEnum;
>>>>>>> 0a1bcc1 (.)
use Modules\Employee\Models\Employee;

/**
 * Class WorkHour.
 *
 * @property int $id
 * @property int $employee_id
 * @property string $type
 * @property Carbon $timestamp
 * @property float|null $location_lat
 * @property float|null $location_lng
 * @property string|null $location_name
 * @property array<string, mixed>|null $device_info
 * @property string|null $photo_path
 * @property string|null $notes
 * @property string $status
 * @property int|null $approved_by
 * @property Carbon|null $approved_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read \Modules\User\Models\User|null $approvedBy
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
<<<<<<< HEAD
    // Constants replaced by enums - see WorkHourTypeEnum and WorkHourStatusEnum
    // public const TYPE_CLOCK_IN = 'clock_in';
    // public const TYPE_CLOCK_OUT = 'clock_out';
    // public const TYPE_BREAK_START = 'break_start';
    // public const TYPE_BREAK_END = 'break_end';

    public const TYPES = [
        'clock_in',
        'clock_out',
        'break_start',
        'break_end',
    ];

    // public const STATUS_PENDING = 'pending';
    // public const STATUS_APPROVED = 'approved';
    // public const STATUS_REJECTED = 'rejected';

=======
    public const TYPES = [
        WorkHourTypeEnum::CLOCK_IN->value,
        WorkHourTypeEnum::CLOCK_OUT->value,
        WorkHourTypeEnum::BREAK_START->value,
        WorkHourTypeEnum::BREAK_END->value,
    ];

>>>>>>> 0a1bcc1 (.)
    public const STATUSES = [
        'pending',
        'approved',
        'rejected',
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
            'timestamp' => 'datetime',
            'location_lat' => 'decimal:8',
            'location_lng' => 'decimal:8',
            'device_info' => 'array',
            'approved_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'type' => \Modules\Employee\Enums\WorkHourTypeEnum::class,
            'status' => \Modules\Employee\Enums\WorkHourStatusEnum::class,
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 0a1bcc1 (.)
=======
>>>>>>> 5098881 (.)
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
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param int $employeeId
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeForEmployee(Builder $query, int $employeeId): Builder
    {
        return $query->where('employee_id', $employeeId);
    }

    /**
     * Scope a query to only include work hours of a specific type.
     *
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * Scope a query to only include work hours for a specific date.
     *
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param Carbon $date
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeForDate(Builder $query, Carbon $date): Builder
    {
        return $query->whereDate('timestamp', $date);
    }

    /**
     * Scope a query to only include work hours for today.
     *
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('timestamp', Carbon::today());
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Get the formatted time.
     *
     * @return string
     */
=======
     *
     * @return string
     */
=======
>>>>>>> 0a1bcc1 (.)
    public function getFormattedTimeAttribute(): string
=======
     /**
     * @return string
     */    public function getFormattedTimeAttribute(): string
>>>>>>> 5098881 (.)
    {
        return $this->timestamp->format('H:i:s');
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Get the formatted date.
     *
     * @return string
     */
=======
     *
     * @return string
     */
=======
>>>>>>> 0a1bcc1 (.)
    public function getFormattedDateAttribute(): string
=======
     /**
     * @return string
     */    public function getFormattedDateAttribute(): string
>>>>>>> 5098881 (.)
    {
        return $this->timestamp->format('d/m/Y');
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Get the formatted date and time.
     *
     * @return string
     */
=======
     *
     * @return string
     */
=======
>>>>>>> 0a1bcc1 (.)
    public function getFormattedDateTimeAttribute(): string
=======
     /**
     * @return string
     */    public function getFormattedDateTimeAttribute(): string
>>>>>>> 5098881 (.)
    {
        return $this->timestamp->format('d/m/Y H:i:s');
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
=======
>>>>>>> 0a1bcc1 (.)
     * Check if the work hour is a clock in.
     *
     * @return bool
     */
<<<<<<< HEAD
    public function isClockIn(): bool
    {
        return $this->type === self::TYPE_CLOCK_IN;
    }

    /**
     * Check if the work hour is a clock out.
     *
     * @return bool
     */
    public function isClockOut(): bool
    {
        return $this->type === self::TYPE_CLOCK_OUT;
    }

    /**
     * Check if the work hour is a break start.
     *
     * @return bool
     */
    public function isBreakStart(): bool
    {
        return $this->type === self::TYPE_BREAK_START;
    }

    /**
     * Check if the work hour is a break end.
     *
     * @return bool
     */
    public function isBreakEnd(): bool
    {
        return $this->type === self::TYPE_BREAK_END;
    }

    /**
     * Get the last work hour entry for an employee on a specific date.
     *
     * @param int $employeeId
     * @param Carbon|null $date
     * @return WorkHour|null
     */
    public static function getLastEntryForEmployee(int $employeeId, ?Carbon $date = null): ?WorkHour
    {
        $date = $date ?? Carbon::today();
        
=======
=======
    public function isClockIn(): bool
=======
     /** Check if the work hour is a clock in.
     *
     * @return bool
     */    public function isClockIn(): bool
>>>>>>> 5098881 (.)
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

            public static function getLastEntryForEmployee(int $employeeId, ?Carbon $date = null): ?WorkHour
    {
        $date = $date ?? Carbon::today();
>>>>>>> 0a1bcc1 (.)
        return static::forEmployee($employeeId)
            ->forDate($date)
            ->orderBy('timestamp', 'desc')
            ->first();
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Get the next expected action for an employee based on their last entry.
=======
>>>>>>> 0a1bcc1 (.)
     *
     * @param int $employeeId
     * @param Carbon|null $date
     * @return string
     */
<<<<<<< HEAD
=======
=======
>>>>>>> 0a1bcc1 (.)
    public static function getNextAction(int $employeeId, ?Carbon $date = null): string
=======
     /**
     * @param int $employeeId
     * @param Carbon|null $date
     * @return string
     */    public static function getNextAction(int $employeeId, ?Carbon $date = null): string
>>>>>>> 5098881 (.)
    {
        $lastEntry = static::getLastEntryForEmployee($employeeId, $date);

<<<<<<< HEAD
        if (!$lastEntry) {
            return self::TYPE_CLOCK_IN;
        }

        return match ($lastEntry->type) {
            self::TYPE_CLOCK_IN => self::TYPE_BREAK_START,
            self::TYPE_BREAK_START => self::TYPE_BREAK_END,
            self::TYPE_BREAK_END => self::TYPE_CLOCK_OUT,
            self::TYPE_CLOCK_OUT => self::TYPE_CLOCK_IN,
            default => self::TYPE_CLOCK_IN,
        };
    }

    /**
     * Validate if a new entry is allowed based on the last entry.
=======
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
    }

<<<<<<< HEAD
>>>>>>> 0a1bcc1 (.)
     *
=======
    /**
>>>>>>> 5098881 (.)
     * @param int $employeeId
     * @param string $type
     * @param Carbon|null $date
     * @return bool
<<<<<<< HEAD
     */
<<<<<<< HEAD
=======
=======
>>>>>>> 0a1bcc1 (.)
=======
     */    
>>>>>>> 5098881 (.)
    public static function isValidNextEntry(int $employeeId, string $type, ?Carbon $date = null): bool
    {
        $expectedAction = static::getNextAction($employeeId, $date);
        return $expectedAction === $type;
    }

    /**
<<<<<<< HEAD
     * Get all work hours for an employee on a specific date.
     *
     * @param int $employeeId
     * @param Carbon|null $date
<<<<<<< HEAD
=======
     * @param int $employeeId
     * @param Carbon|null $date
=======
>>>>>>> 0a1bcc1 (.)
=======
>>>>>>> 5098881 (.)
     * @return \Illuminate\Database\Eloquent\Collection<int, WorkHour>
     */
    public static function getTodayEntries(int $employeeId, ?Carbon $date = null): \Illuminate\Database\Eloquent\Collection
    {
        $date = $date ?? Carbon::today();
        
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======

>>>>>>> 0a1bcc1 (.)
=======
>>>>>>> 5098881 (.)
        return static::forEmployee($employeeId)
            ->forDate($date)
            ->orderBy('timestamp', 'asc')
            ->get();
    }
<<<<<<< HEAD

<<<<<<< HEAD
    /**
     * Calculate total worked hours for an employee on a specific date.
     *
=======
>>>>>>> 0a1bcc1 (.)
=======
     /**
>>>>>>> 5098881 (.)
     * @param int $employeeId
     * @param Carbon|null $date
     * @return float Hours worked
     */
    public static function calculateWorkedHours(int $employeeId, ?Carbon $date = null): float
    {
        $entries = static::getTodayEntries($employeeId, $date);
<<<<<<< HEAD
        
<<<<<<< HEAD
=======
=======
    public static function calculateWorkedHours(int $employeeId, ?Carbon $date = null): float
    {
        $entries = static::getTodayEntries($employeeId, $date);
>>>>>>> 0a1bcc1 (.)
        if ($entries->isEmpty()) {
            return 0.0;
        }

=======
>>>>>>> 5098881 (.)
        $totalMinutes = 0;
        $clockInTime = null;
<<<<<<< HEAD
        $breakStartTime = null;
=======
>>>>>>> 0a1bcc1 (.)

        /** @var WorkHour $entry */
        foreach ($entries as $entry) {
            if (!($entry instanceof WorkHour)) {
                continue;
            }
            switch ($entry->type) {
<<<<<<< HEAD
                case self::TYPE_CLOCK_IN:
                    $clockInTime = $entry->timestamp;
                    break;
                    
                case self::TYPE_BREAK_START:
<<<<<<< HEAD
                    if ($clockInTime) {
                        $totalMinutes += $clockInTime->diffInMinutes($entry->timestamp);
                    }
                    $breakStartTime = $entry->timestamp;
=======
=======
=======
>>>>>>> 5098881 (.)
                case WorkHourTypeEnum::CLOCK_IN->value:
                    $clockInTime = $entry->timestamp;
                    break;

                case WorkHourTypeEnum::BREAK_START->value:
                    if ($clockInTime) {
                        $totalMinutes += $clockInTime->diffInMinutes($entry->timestamp);
                    }
                    $clockInTime = null;
>>>>>>> 0a1bcc1 (.)
                    break;
                    
<<<<<<< HEAD
                case self::TYPE_BREAK_END:
                    $clockInTime = $entry->timestamp; // Resume work
                    break;
                    
                case self::TYPE_CLOCK_OUT:
<<<<<<< HEAD
=======
=======

                case WorkHourTypeEnum::BREAK_END->value:
                    $clockInTime = $entry->timestamp; // Resume work
                    break;

                case WorkHourTypeEnum::CLOCK_OUT->value:
>>>>>>> 0a1bcc1 (.)
                    if ($clockInTime) {
                        $totalMinutes += $clockInTime->diffInMinutes($entry->timestamp);
                        $clockInTime = null;
                    }
                    break;
=======
                case WorkHourTypeEnum::BREAK_END->value:
                    $clockInTime = $entry->timestamp; // Resume work
                    break;
                    
>>>>>>> 5098881 (.)
            }
        }

        return round($totalMinutes / 60, 2);
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Get the current status for an employee.
=======
>>>>>>> 0a1bcc1 (.)
     *
=======
     /**
>>>>>>> 5098881 (.)
     * @param int $employeeId
     * @param Carbon|null $date
     * @return string
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 0a1bcc1 (.)
=======
>>>>>>> 5098881 (.)
    public static function getCurrentStatus(int $employeeId, ?Carbon $date = null): string
    {
        $lastEntry = static::getLastEntryForEmployee($employeeId, $date);

<<<<<<< HEAD
        if (!$lastEntry) {
<<<<<<< HEAD
=======
=======
        if (! $lastEntry) {
>>>>>>> 0a1bcc1 (.)
            return 'not_clocked_in';
        }

        return match ($lastEntry->type) {
            self::TYPE_CLOCK_IN => 'clocked_in',
            self::TYPE_BREAK_START => 'on_break',
            self::TYPE_BREAK_END => 'clocked_in',
            self::TYPE_CLOCK_OUT => 'clocked_out',
<<<<<<< HEAD
=======
=======
            WorkHourTypeEnum::CLOCK_IN->value => 'clocked_in',
            WorkHourTypeEnum::BREAK_START->value => 'on_break',
            WorkHourTypeEnum::BREAK_END->value => 'clocked_in',
            WorkHourTypeEnum::CLOCK_OUT->value => 'clocked_out',
>>>>>>> 0a1bcc1 (.)
            default => 'not_clocked_in',
=======
        if (! $lastEntry) {
            return "not_clocked_in";
        }

        return match ($lastEntry->type) {
            WorkHourTypeEnum::CLOCK_IN->value => "clocked_in",
            WorkHourTypeEnum::BREAK_START->value => "on_break",
            WorkHourTypeEnum::BREAK_END->value => "clocked_in",
            WorkHourTypeEnum::CLOCK_OUT->value => "clocked_out",
            default => "not_clocked_in",
>>>>>>> 5098881 (.)
        };
    }
}
