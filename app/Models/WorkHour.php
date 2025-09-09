<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Carbon\Carbon;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Modules\Employee\Models\Employee;
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
>>>>>>> c1ac34e (.)
=======
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Modules\Employee\Models\Employee;
>>>>>>> da93016 (.)

/**
 * Class WorkHour.
 *
 * @property int $id
 * @property int $employee_id
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string $type
=======
 * @property WorkHourTypeEnum $type
>>>>>>> c1ac34e (.)
=======
 * @property string $type
>>>>>>> da93016 (.)
 * @property Carbon $timestamp
 * @property float|null $location_lat
 * @property float|null $location_lng
 * @property string|null $location_name
<<<<<<< HEAD
<<<<<<< HEAD
 * @property array|null $device_info
 * @property string|null $photo_path
 * @property string|null $notes
 * @property string $status
=======
 * @property array<string, mixed>|null $device_info
 * @property string|null $photo_path
 * @property string|null $notes
 * @property WorkHourStatusEnum $status
>>>>>>> c1ac34e (.)
=======
 * @property array|null $device_info
 * @property string|null $photo_path
 * @property string|null $notes
 * @property string $status
>>>>>>> da93016 (.)
 * @property int|null $approved_by
 * @property Carbon|null $approved_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read \Modules\User\Models\User|null $approvedBy
 */
class WorkHour extends BaseModel
{
<<<<<<< HEAD
<<<<<<< HEAD
    public const TYPE_CLOCK_IN = 'clock_in';
    public const TYPE_CLOCK_OUT = 'clock_out';
    public const TYPE_BREAK_START = 'break_start';
    public const TYPE_BREAK_END = 'break_end';

    public const TYPES = [
        self::TYPE_CLOCK_IN,
        self::TYPE_CLOCK_OUT,
        self::TYPE_BREAK_START,
        self::TYPE_BREAK_END,
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    public const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_APPROVED,
        self::STATUS_REJECTED,
=======
    /**
     * Backward compatibility constants - deprecated, use enum instead.
     *
     * @deprecated Use WorkHourTypeEnum::class instead
     */
=======
>>>>>>> da93016 (.)
    public const TYPE_CLOCK_IN = 'clock_in';
    public const TYPE_CLOCK_OUT = 'clock_out';
    public const TYPE_BREAK_START = 'break_start';
    public const TYPE_BREAK_END = 'break_end';

    public const TYPES = [
        self::TYPE_CLOCK_IN,
        self::TYPE_CLOCK_OUT,
        self::TYPE_BREAK_START,
        self::TYPE_BREAK_END,
    ];

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    public const STATUSES = [
<<<<<<< HEAD
        'pending' => 'pending',
        'approved' => 'approved',
        'rejected' => 'rejected',
>>>>>>> c1ac34e (.)
=======
        self::STATUS_PENDING,
        self::STATUS_APPROVED,
        self::STATUS_REJECTED,
>>>>>>> da93016 (.)
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
<<<<<<< HEAD
<<<<<<< HEAD
    protected $table = 'time_entries';
=======
    protected $table = 'work_hours';
>>>>>>> c1ac34e (.)
=======
    protected $table = 'time_entries';
>>>>>>> da93016 (.)

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
<<<<<<< HEAD
=======
            'type' => WorkHourTypeEnum::class,
            'status' => WorkHourStatusEnum::class,
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
            'timestamp' => 'datetime',
            'location_lat' => 'decimal:8',
            'location_lng' => 'decimal:8',
            'device_info' => 'array',
            'approved_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the employee that owns the work hour record.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\Employee\Models\Employee, \Modules\Employee\Models\WorkHour>
=======
     * @return BelongsTo<Employee, $this>
>>>>>>> c1ac34e (.)
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\Employee\Models\Employee, \Modules\Employee\Models\WorkHour>
>>>>>>> da93016 (.)
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * Get the user who approved the time entry.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\User\Models\User, \Modules\Employee\Models\WorkHour>
=======
     * @return BelongsTo<\Modules\User\Models\User, $this>
>>>>>>> c1ac34e (.)
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\User\Models\User, \Modules\Employee\Models\WorkHour>
>>>>>>> da93016 (.)
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(\Modules\User\Models\User::class, 'approved_by');
    }

    /**
     * Scope a query to only include work hours for a specific employee.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param int $employeeId
=======
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
>>>>>>> c1ac34e (.)
=======
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param int $employeeId
>>>>>>> da93016 (.)
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
<<<<<<< HEAD
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param string $type
=======
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
>>>>>>> c1ac34e (.)
=======
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param string $type
>>>>>>> da93016 (.)
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
<<<<<<< HEAD
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param Carbon $date
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeForDate(Builder $query, Carbon $date): Builder
    {
        return $query->whereDate('timestamp', $date);
=======
     * @param  Builder<WorkHour>  $query
=======
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param Carbon $date
     * @return \Illuminate\Database\Eloquent\Builder<static>
>>>>>>> da93016 (.)
     */
    public function scopeForDate(Builder $query, Carbon $date): Builder
    {
<<<<<<< HEAD
        $query->whereDate('timestamp', $date);
>>>>>>> c1ac34e (.)
=======
        return $query->whereDate('timestamp', $date);
>>>>>>> da93016 (.)
    }

    /**
     * Scope a query to only include work hours for today.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('timestamp', Carbon::today());
=======
     * @param  Builder<WorkHour>  $query
=======
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @return \Illuminate\Database\Eloquent\Builder<static>
>>>>>>> da93016 (.)
     */
    public function scopeToday(Builder $query): Builder
    {
<<<<<<< HEAD
        $query->whereDate('timestamp', Carbon::today());
>>>>>>> c1ac34e (.)
=======
        return $query->whereDate('timestamp', Carbon::today());
>>>>>>> da93016 (.)
    }

    /**
     * Get the formatted time.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @return string
>>>>>>> da93016 (.)
     */
    public function getFormattedTimeAttribute(): string
    {
        return $this->timestamp->format('H:i:s');
    }

    /**
     * Get the formatted date.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @return string
>>>>>>> da93016 (.)
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->timestamp->format('d/m/Y');
    }

    /**
     * Get the formatted date and time.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> c1ac34e (.)
=======
     *
     * @return string
>>>>>>> da93016 (.)
     */
    public function getFormattedDateTimeAttribute(): string
    {
        return $this->timestamp->format('d/m/Y H:i:s');
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
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
<<<<<<< HEAD
=======
     * Get the last work hour entry for an employee on a specific date.
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
     */
    public static function getLastEntryForEmployee(int $employeeId, ?Carbon $date = null): ?WorkHour
    {
        $date = $date ?? Carbon::today();
<<<<<<< HEAD
<<<<<<< HEAD
        
        return static::forEmployee($employeeId)
            ->forDate($date)
=======

        /** @var WorkHour|null */
        return static::query()
            ->where('employee_id', $employeeId)
            ->whereDate('timestamp', $date)
>>>>>>> c1ac34e (.)
=======
        
        return static::forEmployee($employeeId)
            ->forDate($date)
>>>>>>> da93016 (.)
            ->orderBy('timestamp', 'desc')
            ->first();
    }

    /**
     * Get the next expected action for an employee based on their last entry.
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
     *
     * @param int $employeeId
     * @param Carbon|null $date
     * @return string
<<<<<<< HEAD
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
=======
=======
>>>>>>> da93016 (.)
     */
    public static function getNextAction(int $employeeId, ?Carbon $date = null): string
    {
        $lastEntry = static::getLastEntryForEmployee($employeeId, $date);

        if (!$lastEntry) {
            return self::TYPE_CLOCK_IN;
        }

<<<<<<< HEAD
        return $lastEntry->type->getNextAction();
>>>>>>> c1ac34e (.)
=======
        return match ($lastEntry->type) {
            self::TYPE_CLOCK_IN => self::TYPE_BREAK_START,
            self::TYPE_BREAK_START => self::TYPE_BREAK_END,
            self::TYPE_BREAK_END => self::TYPE_CLOCK_OUT,
            self::TYPE_CLOCK_OUT => self::TYPE_CLOCK_IN,
            default => self::TYPE_CLOCK_IN,
        };
>>>>>>> da93016 (.)
    }

    /**
     * Validate if a new entry is allowed based on the last entry.
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
     *
     * @param int $employeeId
     * @param string $type
     * @param Carbon|null $date
     * @return bool
<<<<<<< HEAD
     */
    public static function isValidNextEntry(int $employeeId, string $type, ?Carbon $date = null): bool
    {
        $expectedAction = static::getNextAction($employeeId, $date);
=======
=======
>>>>>>> da93016 (.)
     */
    public static function isValidNextEntry(int $employeeId, string $type, ?Carbon $date = null): bool
    {
        $expectedAction = static::getNextAction($employeeId, $date);
<<<<<<< HEAD

>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
        return $expectedAction === $type;
    }

    /**
     * Get all work hours for an employee on a specific date.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param int $employeeId
     * @param Carbon|null $date
=======
>>>>>>> c1ac34e (.)
=======
     * @param int $employeeId
     * @param Carbon|null $date
>>>>>>> da93016 (.)
     * @return \Illuminate\Database\Eloquent\Collection<int, WorkHour>
     */
    public static function getTodayEntries(int $employeeId, ?Carbon $date = null): \Illuminate\Database\Eloquent\Collection
    {
        $date = $date ?? Carbon::today();
<<<<<<< HEAD
<<<<<<< HEAD
        
        return static::forEmployee($employeeId)
            ->forDate($date)
=======

        /** @var \Illuminate\Database\Eloquent\Collection<int, WorkHour> */
        return static::query()
            ->where('employee_id', $employeeId)
            ->whereDate('timestamp', $date)
>>>>>>> c1ac34e (.)
=======
        
        return static::forEmployee($employeeId)
            ->forDate($date)
>>>>>>> da93016 (.)
            ->orderBy('timestamp', 'asc')
            ->get();
    }

    /**
     * Calculate total worked hours for an employee on a specific date.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param int $employeeId
     * @param Carbon|null $date
=======
>>>>>>> c1ac34e (.)
=======
     * @param int $employeeId
     * @param Carbon|null $date
>>>>>>> da93016 (.)
     * @return float Hours worked
     */
    public static function calculateWorkedHours(int $employeeId, ?Carbon $date = null): float
    {
        $entries = static::getTodayEntries($employeeId, $date);
<<<<<<< HEAD
<<<<<<< HEAD
        
=======

>>>>>>> c1ac34e (.)
=======
        
>>>>>>> da93016 (.)
        if ($entries->isEmpty()) {
            return 0.0;
        }

        $totalMinutes = 0;
        $clockInTime = null;
        $breakStartTime = null;

        foreach ($entries as $entry) {
            switch ($entry->type) {
<<<<<<< HEAD
<<<<<<< HEAD
                case self::TYPE_CLOCK_IN:
                    $clockInTime = $entry->timestamp;
                    break;
                    
                case self::TYPE_BREAK_START:
=======
                case WorkHourTypeEnum::CLOCK_IN:
                    $clockInTime = $entry->timestamp;
                    break;

                case WorkHourTypeEnum::BREAK_START:
>>>>>>> c1ac34e (.)
=======
                case self::TYPE_CLOCK_IN:
                    $clockInTime = $entry->timestamp;
                    break;
                    
                case self::TYPE_BREAK_START:
>>>>>>> da93016 (.)
                    if ($clockInTime) {
                        $totalMinutes += $clockInTime->diffInMinutes($entry->timestamp);
                    }
                    $breakStartTime = $entry->timestamp;
                    break;
<<<<<<< HEAD
<<<<<<< HEAD
                    
                case self::TYPE_BREAK_END:
                    $clockInTime = $entry->timestamp; // Resume work
                    break;
                    
                case self::TYPE_CLOCK_OUT:
=======

                case WorkHourTypeEnum::BREAK_END:
                    $clockInTime = $entry->timestamp; // Resume work
                    break;

                case WorkHourTypeEnum::CLOCK_OUT:
>>>>>>> c1ac34e (.)
=======
                    
                case self::TYPE_BREAK_END:
                    $clockInTime = $entry->timestamp; // Resume work
                    break;
                    
                case self::TYPE_CLOCK_OUT:
>>>>>>> da93016 (.)
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
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
     *
     * @param int $employeeId
     * @param Carbon|null $date
     * @return string
<<<<<<< HEAD
=======
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
     */
    public static function getCurrentStatus(int $employeeId, ?Carbon $date = null): string
    {
        $lastEntry = static::getLastEntryForEmployee($employeeId, $date);

<<<<<<< HEAD
<<<<<<< HEAD
        if (!$lastEntry) {
=======
        if (! $lastEntry) {
>>>>>>> c1ac34e (.)
=======
        if (!$lastEntry) {
>>>>>>> da93016 (.)
            return 'not_clocked_in';
        }

        return match ($lastEntry->type) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
            self::TYPE_CLOCK_IN => 'clocked_in',
            self::TYPE_BREAK_START => 'on_break',
            self::TYPE_BREAK_END => 'clocked_in',
            self::TYPE_CLOCK_OUT => 'clocked_out',
            default => 'not_clocked_in',
<<<<<<< HEAD
=======
            WorkHourTypeEnum::CLOCK_IN => 'clocked_in',
            WorkHourTypeEnum::BREAK_START => 'on_break',
            WorkHourTypeEnum::BREAK_END => 'clocked_in',
            WorkHourTypeEnum::CLOCK_OUT => 'clocked_out',
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
        };
    }
}
