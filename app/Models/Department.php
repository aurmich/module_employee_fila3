<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Employee\Database\Factories\DepartmentFactory;

/**
 * Class Department.
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $status
 * @property int|null $manager_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<Employee> $employees
 */
class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'manager_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the employees that belong to this department.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Employee, $this>
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'department_id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): DepartmentFactory
    {
        return DepartmentFactory::new();
    }
}
