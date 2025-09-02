<?php

declare(strict_types=1);

namespace Modules\Employee\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
use Modules\User\Models\User;

/**
 * Class TimeRecord.
 *
 * @property int $id
 * @property int $user_id
 * @property Carbon $timestamp
 * @property string $type
 * @property string $method
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $address
 * @property string|null $notes
 * @property string $status
 * @property bool $is_manual
<<<<<<< HEAD
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
=======
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Models\User;

/**
 * Class Timbratura.
 *
 * @property int $id
 * @property int $user_id
 * @property Carbon $data_timbratura
 * @property string $tipo
 * @property string $metodo
 * @property string|null $latitudine
 * @property string|null $longitudine
 * @property string|null $indirizzo
 * @property string|null $note
 * @property string $stato
 * @property bool $is_manuale
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 */
<<<<<<< HEAD
class TimeRecord extends BaseModel
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
class TimeRecord extends BaseModel
=======
class Timbratura extends BaseModel
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
class TimeRecord extends BaseModel
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
<<<<<<< HEAD
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
        'timestamp',
        'type',
        'method',
        'latitude',
        'longitude',
        'address',
        'notes',
        'status',
        'is_manual',
<<<<<<< HEAD
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
=======
        'data_timbratura',
        'tipo',
        'metodo',
        'latitudine',
        'longitudine',
        'indirizzo',
        'note',
        'stato',
        'is_manuale',
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
        'created_by',
        'updated_by',
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
            'timestamp' => 'datetime',
            'is_manual' => 'boolean',
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
            'timestamp' => 'datetime',
            'is_manual' => 'boolean',
=======
            'data_timbratura' => 'datetime',
            'is_manuale' => 'boolean',
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
            'timestamp' => 'datetime',
            'is_manual' => 'boolean',
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the user that owns the timbratura.
<<<<<<< HEAD
=======
     *
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\User\Models\User, \Modules\Employee\Models\Timbratura>
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that created the timbratura.
<<<<<<< HEAD
=======
     *
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\User\Models\User, \Modules\Employee\Models\Timbratura>
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user that updated the timbratura.
<<<<<<< HEAD
=======
     *
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\User\Models\User, \Modules\Employee\Models\Timbratura>
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
<<<<<<< HEAD
     * Scope a query to only include time records for a specific user.
     *
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
     * Scope a query to only include time records for a specific user.
=======
     * Scope a query to only include timbrature for a specific user.
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
     * Scope a query to only include time records for a specific user.
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
     *
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param int $userId
>>>>>>> fda50b5 (.)
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeForUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
<<<<<<< HEAD
     * Scope a query to only include time records of a specific type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
     * Scope a query to only include time records of a specific type.
     *
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param string $type
>>>>>>> fda50b5 (.)
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope a query to only include time records for a specific date.
<<<<<<< HEAD
     *
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
=======
     * Scope a query to only include timbrature of a specific type.
     *
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param string $tipo
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeOfType($query, string $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Scope a query to only include timbrature for a specific date.
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
     *
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
     * @param Carbon $date
>>>>>>> fda50b5 (.)
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeForDate($query, Carbon $date)
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
        return $query->whereDate('timestamp', $date);
    }

    /**
     * Scope a query to only include valid time records.
<<<<<<< HEAD
     *
     * @param  \Illuminate\Database\Eloquent\Builder<static>  $query
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
=======
        return $query->whereDate('data_timbratura', $date);
    }

    /**
     * Scope a query to only include valid timbrature.
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
     *
     * @param \Illuminate\Database\Eloquent\Builder<static> $query
>>>>>>> fda50b5 (.)
     * @return \Illuminate\Database\Eloquent\Builder<static>
     */
    public function scopeValid($query)
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
        return $query->where('status', 'valid');
    }

    /**
     * Get the formatted timestamp.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> fda50b5 (.)
     */
    public function getFormattedTimestampAttribute(): string
    {
        return $this->timestamp->format('d/m/Y H:i:s');
<<<<<<< HEAD
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
=======
        return $query->where('stato', 'valid');
=======
        return $query->where('stato', 'valida');
>>>>>>> 2710eada86 (.)
    }

    /**
     * Get the formatted data timbratura.
     *
     * @return string
     */
    public function getFormattedDataTimbraturaAttribute(): string
    {
        return $this->data_timbratura->format('d/m/Y H:i:s');
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
    }

    /**
     * Get the formatted time only.
<<<<<<< HEAD
     */
    public function getFormattedTimeAttribute(): string
    {
        return $this->timestamp->format('H:i:s');
=======
     *
     * @return string
     */
    public function getFormattedTimeAttribute(): string
    {
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
        return $this->timestamp->format('H:i:s');
=======
        return $this->data_timbratura->format('H:i:s');
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
        return $this->timestamp->format('H:i:s');
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
    }

    /**
     * Get the formatted date only.
<<<<<<< HEAD
     */
    public function getFormattedDateAttribute(): string
    {
=======
     *
     * @return string
     */
    public function getFormattedDateAttribute(): string
    {
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
        return $this->timestamp->format('d/m/Y');
    }

    /**
     * Check if the time record is an entry.
<<<<<<< HEAD
     */
    public function isEntry(): bool
    {
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
=======
        return $this->data_timbratura->format('d/m/Y');
    }

    /**
     * Check if the timbratura is an entry.
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
     *
     * @return bool
     */
    public function isEntry(): bool
    {
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
        return $this->type === 'entry';
    }

    /**
     * Check if the time record is an exit.
<<<<<<< HEAD
     */
    public function isExit(): bool
    {
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
=======
        return $this->tipo === 'entrata';
    }

    /**
     * Check if the timbratura is an exit.
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
     *
     * @return bool
     */
    public function isExit(): bool
    {
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
        return $this->type === 'exit';
    }

    /**
     * Check if the time record is manual.
<<<<<<< HEAD
     */
    public function isManual(): bool
    {
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
=======
        return $this->tipo === 'uscita';
    }

    /**
     * Check if the timbratura is manual.
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
     *
     * @return bool
     */
    public function isManual(): bool
    {
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
>>>>>>> fda50b5 (.)
        return $this->is_manual;
    }

    /**
     * Check if the time record has location data.
<<<<<<< HEAD
     */
    public function hasLocation(): bool
    {
        return ! empty($this->latitude) && ! empty($this->longitude);
    }
}
=======
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
=======
        return $this->is_manuale;
    }

    /**
     * Check if the timbratura has location data.
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
     *
     * @return bool
     */
    public function hasLocation(): bool
    {
<<<<<<< HEAD:laravel/Modules/Employee/app/Models/Timbratura.php
<<<<<<< HEAD
        return !empty($this->latitude) && !empty($this->longitude);
=======
        return !empty($this->latitudine) && !empty($this->longitudine);
>>>>>>> a61a2390f3 (✨ (Chart.php, Page.php, EmployeeController.php, BaseModel.php, Timbratura.php): add new properties and methods to enhance functionality and improve code structure)
=======
        return !empty($this->latitude) && !empty($this->longitude);
>>>>>>> 5f0a97af45 (.):laravel/Modules/Employee/app/Models/TimeRecord.php
    }
} 
>>>>>>> fda50b5 (.)
