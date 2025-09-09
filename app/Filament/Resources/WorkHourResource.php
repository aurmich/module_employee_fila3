<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources;

<<<<<<< HEAD
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
=======
use Carbon\Carbon;
>>>>>>> da93016 (.)
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Resources\XotBaseResource;
<<<<<<< HEAD
>>>>>>> c1ac34e (.)
=======
use Modules\Employee\Models\Employee;
>>>>>>> da93016 (.)

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
<<<<<<< HEAD
                   
=======

>>>>>>> c1ac34e (.)
=======
                   
>>>>>>> da93016 (.)
                ])
                ->columns(2),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> c1ac34e (.)
=======

>>>>>>> da93016 (.)
    /**
     * @return array<class-string<\Filament\Widgets\Widget>>
     */
    public static function getHeaderWidgets(): array
    {
        return [];
    }
}
