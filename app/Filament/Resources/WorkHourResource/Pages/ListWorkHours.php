<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources\WorkHourResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Employee\Filament\Resources\WorkHourResource;
=======
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Employee\Filament\Resources\WorkHourResource;
use Modules\Employee\Models\WorkHour;
>>>>>>> 95b3a4c (.)
=======
use Modules\Employee\Filament\Resources\WorkHourResource;
>>>>>>> 6229c57 (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListWorkHours extends XotBaseListRecords
{
    protected static string $resource = WorkHourResource::class;

    // getTableColumns() method removed - XotBaseListRecords handles this automatically
}
