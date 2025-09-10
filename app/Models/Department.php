<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Employee\Models\BaseModel;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Employee\Database\Factories\DepartmentFactory;
>>>>>>> f143926 (.)

/**
 * Class Department.
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
<<<<<<< HEAD
 * @property int|null $manager_id
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Employee\Models\Employee> $employees
 * @property-read int|null $employees_count
 */
class Department extends BaseModel
{
=======
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

>>>>>>> f143926 (.)
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
<<<<<<< HEAD
        'manager_id',
        'is_active',
=======
        'status',
        'manager_id',
>>>>>>> f143926 (.)
    ];

    /**
     * The attributes that should be cast.
     *
<<<<<<< HEAD
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the employees for the department.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
=======
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
>>>>>>> f143926 (.)
