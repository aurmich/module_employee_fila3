<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Employee\Database\Factories\PositionFactory;

/**
 * Class Position.
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
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

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'level',
        'status',
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
