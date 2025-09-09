<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms;
=======
use Carbon\Carbon;
=======
>>>>>>> 6229c57 (.)
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Employee\Models\Employee;
>>>>>>> 95b3a4c (.)
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Resources\XotBaseResource;

class WorkHourResource extends XotBaseResource
{
    protected static ?string $model = WorkHour::class;

    /**
     * @return array<string|int,\Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Time Entry Details')
                ->schema([
<<<<<<< HEAD

=======
                    Forms\Components\Select::make('employee_id')
                        ->relationship('employee', 'name')
                        ->required(),
                    
                    Forms\Components\DateTimePicker::make('clock_in')
                        ->required(),
                    
                    Forms\Components\DateTimePicker::make('clock_out'),
                    
                    Forms\Components\Textarea::make('notes')
                        ->maxLength(65535),
>>>>>>> 95b3a4c (.)
                ])
                ->columns(2),
        ];
    }

    /**
     * @return array<class-string<\Filament\Widgets\Widget>>
     */
    public static function getHeaderWidgets(): array
    {
        return [];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 95b3a4c (.)
