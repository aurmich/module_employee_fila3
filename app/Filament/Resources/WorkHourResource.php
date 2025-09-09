<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources;

<<<<<<< HEAD
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Employee\Models\Employee;
=======
use Filament\Forms;
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Resources\XotBaseResource;
>>>>>>> c1ac34e (.)

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

>>>>>>> c1ac34e (.)
                ])
                ->columns(2),
        ];
    }

<<<<<<< HEAD

=======
>>>>>>> c1ac34e (.)
    /**
     * @return array<class-string<\Filament\Widgets\Widget>>
     */
    public static function getHeaderWidgets(): array
    {
        return [];
    }
}
