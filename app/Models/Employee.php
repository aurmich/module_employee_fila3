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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> da93016 (.)
 * @property array $personal_data
 * @property array $contact_data
 * @property array $work_data
 * @property array $documents
<<<<<<< HEAD
=======
 * @property array<string, mixed> $personal_data
 * @property array<string, mixed> $contact_data
 * @property array<string, mixed> $work_data
 * @property array<string, mixed> $documents
>>>>>>> c1ac34e (.)
=======
>>>>>>> da93016 (.)
 * @property string|null $photo_url
 * @property string $status
 * @property int|null $department_id
 * @property int|null $manager_id
 * @property int|null $position_id
<<<<<<< HEAD
<<<<<<< HEAD
 * @property array $salary_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\User\Models\User|null $user
 * @property-read \Modules\Employee\Models\Department|null $department
 * @property-read \Modules\Employee\Models\Employee|null $manager
 * @property-read \Illuminate\Database\Eloquent\Collection<\Modules\Employee\Models\Employee> $subordinates
 * @property-read \Modules\Employee\Models\Position|null $position
 * @property-read \Illuminate\Database\Eloquent\Collection<\Modules\Employee\Models\WorkHour> $workHours
 * @property-read \Illuminate\Database\Eloquent\Collection<\Modules\Employee\Models\Leave> $leaves
 * @property-read \Illuminate\Database\Eloquent\Collection<\Modules\Employee\Models\Document> $documents
 */
class Employee extends User
{
    protected $table = 'users';
=======
 * @property array<string, mixed> $salary_data
=======
 * @property array $salary_data
>>>>>>> da93016 (.)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\User\Models\User|null $user
 * @property-read \Modules\Employee\Models\Department|null $department
 * @property-read \Modules\Employee\Models\Employee|null $manager
 * @property-read \Illuminate\Database\Eloquent\Collection<\Modules\Employee\Models\Employee> $subordinates
 * @property-read \Modules\Employee\Models\Position|null $position
 * @property-read \Illuminate\Database\Eloquent\Collection<\Modules\Employee\Models\WorkHour> $workHours
 * @property-read \Illuminate\Database\Eloquent\Collection<\Modules\Employee\Models\Leave> $leaves
 * @property-read \Illuminate\Database\Eloquent\Collection<\Modules\Employee\Models\Document> $documents
 */
class Employee extends User
{
<<<<<<< HEAD
    use HasParent;

>>>>>>> c1ac34e (.)
=======
    protected $table = 'users';
>>>>>>> da93016 (.)
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

<<<<<<< HEAD
<<<<<<< HEAD
   
}
=======
    /**
     * Get the work hours for this employee.
     *
     * @return HasMany<WorkHour, $this>
     */
    public function workHours(): HasMany
    {
        return $this->hasMany(WorkHour::class, 'employee_id');
    }

    // Department relationship removed - class doesn't exist

    /**
     * Get the manager of this employee.
     *
     * @return BelongsTo<Employee, $this>
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    /**
     * Get the subordinates of this employee.
     *
     * @return HasMany<Employee, $this>
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
>>>>>>> c1ac34e (.)
=======
   
}
>>>>>>> da93016 (.)
