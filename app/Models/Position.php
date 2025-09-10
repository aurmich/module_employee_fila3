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
use Modules\Employee\Database\Factories\PositionFactory;
>>>>>>> f143926 (.)

/**
 * Class Position.
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
<<<<<<< HEAD
 * @property string|null $department
 * @property int|null $level
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Employee\Models\Employee> $employees
 * @property-read int|null $employees_count
 */
class Position extends BaseModel
{
=======
 * @property string $level
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<Employee> $employees
 */
class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

>>>>>>> f143926 (.)
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
<<<<<<< HEAD
        'department',
        'level',
        'is_active',
=======
        'level',
        'status',
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
            'level' => 'integer',
            'is_active' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the employees for the position.
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
     * Get the employees that have this position.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Employee, $this>
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'position_id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): PositionFactory
    {
        return PositionFactory::new();
    }
}
>>>>>>> f143926 (.)
