<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources\WorkHourResource\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;
=======
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
>>>>>>> c1ac34e (.)
=======
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;
>>>>>>> da93016 (.)
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget;

class WorkHourStatsWidget extends XotBaseStatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = Carbon::today();
        $thisWeekStart = Carbon::now()->startOfWeek();
        $thisWeekEnd = Carbon::now()->endOfWeek();

        // Get stats for today
<<<<<<< HEAD
<<<<<<< HEAD
        $todayTotal = WorkHour::whereDate('timestamp', $today)->count();
        $todayClockIns = WorkHour::where('type', WorkHour::TYPE_CLOCK_IN)
            ->whereDate('timestamp', $today)
            ->count();
        $todayClockOuts = WorkHour::where('type', WorkHour::TYPE_CLOCK_OUT)
=======
        $todayTotal = WorkHour::query()->whereDate('timestamp', $today)->count();
        $todayClockIns = WorkHour::query()
            ->where('type', WorkHourTypeEnum::CLOCK_IN->value)
            ->whereDate('timestamp', $today)
            ->count();
        $todayClockOuts = WorkHour::query()
            ->where('type', WorkHourTypeEnum::CLOCK_OUT->value)
>>>>>>> c1ac34e (.)
=======
        $todayTotal = WorkHour::whereDate('timestamp', $today)->count();
        $todayClockIns = WorkHour::where('type', WorkHour::TYPE_CLOCK_IN)
            ->whereDate('timestamp', $today)
            ->count();
        $todayClockOuts = WorkHour::where('type', WorkHour::TYPE_CLOCK_OUT)
>>>>>>> da93016 (.)
            ->whereDate('timestamp', $today)
            ->count();

        // Get stats for this week
<<<<<<< HEAD
<<<<<<< HEAD
        $weekTotal = WorkHour::whereBetween('timestamp', [$thisWeekStart, $thisWeekEnd])->count();

        // Get pending approvals count
        $pendingApprovals = WorkHour::where('status', WorkHour::STATUS_PENDING)->count();
=======
        $weekTotal = WorkHour::query()->whereBetween('timestamp', [$thisWeekStart, $thisWeekEnd])->count();

        // Get pending approvals count
        $pendingApprovals = WorkHour::query()->where('status', WorkHourStatusEnum::PENDING->value)->count();
>>>>>>> c1ac34e (.)
=======
        $weekTotal = WorkHour::whereBetween('timestamp', [$thisWeekStart, $thisWeekEnd])->count();

        // Get pending approvals count
        $pendingApprovals = WorkHour::where('status', WorkHour::STATUS_PENDING)->count();
>>>>>>> da93016 (.)

        return [
            Stat::make('Today\'s Entries', $todayTotal)
                ->description('Total time entries today')
                ->descriptionIcon('heroicon-m-clock')
                ->color('primary'),

            Stat::make('This Week', $weekTotal)
                ->description('Total entries this week')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('success'),

<<<<<<< HEAD
<<<<<<< HEAD
            Stat::make('Clock In/Out', $todayClockIns . '/' . $todayClockOuts)
=======
            Stat::make('Clock In/Out', $todayClockIns.'/'.$todayClockOuts)
>>>>>>> c1ac34e (.)
=======
            Stat::make('Clock In/Out', $todayClockIns . '/' . $todayClockOuts)
>>>>>>> da93016 (.)
                ->description('Today\'s clock-ins/outs')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('info'),

            Stat::make('Pending Approval', $pendingApprovals)
                ->description('Entries awaiting approval')
                ->descriptionIcon('heroicon-m-exclamation-circle')
                ->color($pendingApprovals > 0 ? 'warning' : 'success'),
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> c1ac34e (.)
=======
}
>>>>>>> da93016 (.)
