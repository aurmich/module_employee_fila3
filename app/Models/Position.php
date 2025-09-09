<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
<<<<<<< HEAD
=======
use Modules\Employee\Models\BaseModel;
>>>>>>> 95b3a4c (.)

/**
 * Class Position.
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
<<<<<<< HEAD
 * @property string $level
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Employee\Models\Employee> $employees
=======
 * @property string|null $department
 * @property int|null $level
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Employee\Models\Employee> $employees
 * @property-read int|null $employees_count
>>>>>>> 95b3a4c (.)
 */
class Position extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
<<<<<<< HEAD
        'level',
        'status',
=======
        'department',
        'level',
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
            'level' => 'integer',
            'is_active' => 'boolean',
>>>>>>> 95b3a4c (.)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
<<<<<<< HEAD
     * Get the employees for this position.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\Employee\Models\Employee>
=======
     * Get the employees for the position.
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
     * Scope a query to only include active positions.
     *
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'attivo');
    }

    /**
     * Check if the position is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'attivo';
    }

    /**
     * Get the position level as a human-readable string.
     */
    public function getLevelLabelAttribute(): string
    {
        return match ($this->level) {
            'entry' => 'Entry Level',
            'junior' => 'Junior',
            'senior' => 'Senior',
            'lead' => 'Lead',
            'manager' => 'Manager',
            'director' => 'Director',
            'executive' => 'Executive',
            default => ucfirst($this->level),
        };
    }
=======
>>>>>>> 95b3a4c (.)
}
