<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
<<<<<<< HEAD
=======
use Modules\Employee\Models\BaseModel;
>>>>>>> 95b3a4c (.)

/**
 * Class Department.
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
<<<<<<< HEAD
 * @property string $status
 * @property int|null $manager_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Employee\Models\Employee> $employees
 * @property-read \Modules\Employee\Models\Employee|null $manager
=======
 * @property int|null $manager_id
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Employee\Models\Employee> $employees
 * @property-read int|null $employees_count
>>>>>>> 95b3a4c (.)
 */
class Department extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
<<<<<<< HEAD
        'status',
        'manager_id',
=======
        'manager_id',
        'is_active',
>>>>>>> 95b3a4c (.)
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
=======
            'is_active' => 'boolean',
>>>>>>> 95b3a4c (.)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
<<<<<<< HEAD
     * Get the employees for this department.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\Employee\Models\Employee>
=======
     * Get the employees for the department.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
>>>>>>> 95b3a4c (.)
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
<<<<<<< HEAD

    /**
     * Get the manager for this department.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\Employee\Models\Employee, \Modules\Employee\Models\Department>
     */
    public function manager(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    /**
     * Scope a query to only include active departments.
     *
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'attivo');
    }

    /**
     * Check if the department is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'attivo';
    }
=======
>>>>>>> 95b3a4c (.)
}
