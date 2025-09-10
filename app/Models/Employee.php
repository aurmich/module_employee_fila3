<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Parental\HasParent;

/**
 * Class Employee.
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $employee_code
 * @property array<string, mixed> $personal_data
 * @property array<string, mixed> $contact_data
 * @property array<string, mixed> $work_data
 * @property array<string, mixed> $documents
 * @property string|null $photo_url
 * @property string $status
 * @property int|null $department_id
 * @property int|null $manager_id
 * @property int|null $position_id
 * @property array<string, mixed> $salary_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\User\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection<\Modules\Employee\Models\WorkHour> $workHours
 */
class Employee extends User
{
    use HasParent;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'employee_code',
        'personal_data',
        'contact_data',
        'work_data',
        'documents',
        'photo_url',
        'status',
        'department_id',
        'manager_id',
        'position_id',
        'salary_data',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'personal_data' => 'array',
            'contact_data' => 'array',
            'work_data' => 'array',
            'documents' => 'array',
            'salary_data' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the work hours for this employee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\Employee\Models\WorkHour, \Modules\Employee\Models\Employee>
     */
    public function workHours(): HasMany
    {
        return $this->hasMany(WorkHour::class, 'employee_id');
    }

    /**
     * Get the department this employee belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\Employee\Models\Department, \Modules\Employee\Models\Employee>
     */
    public function department(): BelongsTo
    {
        // @phpstan-ignore-next-line return.type
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * Get the manager of this employee.
     *
     * @return BelongsTo<Employee, $this>
     */
    public function manager(): BelongsTo
    {
        // @phpstan-ignore-next-line return.type
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    /**
     * Get the subordinates of this employee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\Employee\Models\Employee, \Modules\Employee\Models\Employee>
     */
    public function subordinates(): HasMany
    {
        return $this->hasMany(Employee::class, 'manager_id');
    }

    /**
     * Check if employee is active today.
     */
    public function isActiveToday(): bool
    {
        return $this->workHours()
            ->whereDate('timestamp', today())
            ->exists();
    }

    /**
     * Get employee's status label.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'active' => 'Attivo',
            'inactive' => 'Inattivo',
            'on_leave' => 'In Ferie',
            'terminated' => 'Cessato',
            default => 'Sconosciuto',
        };
    }
}
