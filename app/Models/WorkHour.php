<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
=======
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
=======
            'type' => \Modules\Employee\Enums\WorkHourTypeEnum::class,
            'status' => \Modules\Employee\Enums\WorkHourStatusEnum::class,
>>>>>>> 95b3a4c (.)
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

    /**
     * Get the formatted time.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> 95b3a4c (.)
     */
    public function getFormattedTimeAttribute(): string
    {
        return $this->timestamp->format('H:i:s');
    }

    /**
     * Get the formatted date.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> 95b3a4c (.)
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->timestamp->format('d/m/Y');
    }

    /**
     * Get the formatted date and time.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> 95b3a4c (.)
     */
    public function getFormattedDateTimeAttribute(): string
    {
        return $this->timestamp->format('d/m/Y H:i:s');
    }

    /**
<<<<<<< HEAD
     * Get the last work hour entry for an employee on a specific date.
=======
     * Check if the work hour is a clock in.
     *
     * @return bool
     */
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
        
        return static::forEmployee($employeeId)
            ->forDate($date)
>>>>>>> 95b3a4c (.)
            ->orderBy('timestamp', 'desc')
            ->first();
    }

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
    public static function getNextAction(int $employeeId, ?Carbon $date = null): string
    {
        $lastEntry = static::getLastEntryForEmployee($employeeId, $date);

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
>>>>>>> 95b3a4c (.)
    }

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
    public static function isValidNextEntry(int $employeeId, string $type, ?Carbon $date = null): bool
    {
        $expectedAction = static::getNextAction($employeeId, $date);
>>>>>>> 95b3a4c (.)
        return $expectedAction === $type;
    }

    /**
     * Get all work hours for an employee on a specific date.
     *
<<<<<<< HEAD
=======
     * @param int $employeeId
     * @param Carbon|null $date
>>>>>>> 95b3a4c (.)
     * @return \Illuminate\Database\Eloquent\Collection<int, WorkHour>
     */
    public static function getTodayEntries(int $employeeId, ?Carbon $date = null): \Illuminate\Database\Eloquent\Collection
    {
        $date = $date ?? Carbon::today();
<<<<<<< HEAD

        /** @var \Illuminate\Database\Eloquent\Collection<int, WorkHour> */
        return static::query()
            ->where('employee_id', $employeeId)
            ->whereDate('timestamp', $date)
=======
        
        return static::forEmployee($employeeId)
            ->forDate($date)
>>>>>>> 95b3a4c (.)
            ->orderBy('timestamp', 'asc')
            ->get();
    }

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
        if ($entries->isEmpty()) {
            return 0.0;
        }

        $totalMinutes = 0;
        $clockInTime = null;
        $breakStartTime = null;

        foreach ($entries as $entry) {
            switch ($entry->type) {
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
                    if ($clockInTime) {
                        $totalMinutes += $clockInTime->diffInMinutes($entry->timestamp);
                    }
                    $breakStartTime = $entry->timestamp;
                    break;
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
                    if ($clockInTime) {
                        $totalMinutes += $clockInTime->diffInMinutes($entry->timestamp);
                        $clockInTime = null;
                    }
                    break;
            }
        }

        return round($totalMinutes / 60, 2);
    }

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
    public static function getCurrentStatus(int $employeeId, ?Carbon $date = null): string
    {
        $lastEntry = static::getLastEntryForEmployee($employeeId, $date);

<<<<<<< HEAD
        if (! $lastEntry) {
=======
        if (!$lastEntry) {
>>>>>>> 95b3a4c (.)
            return 'not_clocked_in';
        }

        return match ($lastEntry->type) {
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
            default => 'not_clocked_in',
>>>>>>> 95b3a4c (.)
        };
    }
}
