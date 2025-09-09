<?php

declare(strict_types=1);

namespace Modules\Employee\Filament\Resources\WorkHourResource\Widgets;

<<<<<<< HEAD
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget\Stat;
=======
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;
>>>>>>> 95b3a4c (.)
use Modules\Employee\Enums\WorkHourStatusEnum;
use Modules\Employee\Enums\WorkHourTypeEnum;
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
        $todayTotal = WorkHour::query()->whereDate('timestamp', $today)->count();
        $todayClockIns = WorkHour::query()
            ->where('type', WorkHourTypeEnum::CLOCK_IN->value)
            ->whereDate('timestamp', $today)
            ->count();
        $todayClockOuts = WorkHour::query()
            ->where('type', WorkHourTypeEnum::CLOCK_OUT->value)
=======
        $todayTotal = WorkHour::whereDate('timestamp', $today)->count();
        $todayClockIns = WorkHour::where('type', WorkHour::TYPE_CLOCK_IN)
            ->whereDate('timestamp', $today)
            ->count();
        $todayClockOuts = WorkHour::where('type', WorkHour::TYPE_CLOCK_OUT)
>>>>>>> 95b3a4c (.)
            ->whereDate('timestamp', $today)
            ->count();

        // Get stats for this week
<<<<<<< HEAD
        $weekTotal = WorkHour::query()->whereBetween('timestamp', [$thisWeekStart, $thisWeekEnd])->count();

        // Get pending approvals count
        $pendingApprovals = WorkHour::query()->where('status', WorkHourStatusEnum::PENDING->value)->count();
=======
        $weekTotal = WorkHour::whereBetween('timestamp', [$thisWeekStart, $thisWeekEnd])->count();

        // Get pending approvals count
        $pendingApprovals = WorkHour::where('status', WorkHour::STATUS_PENDING)->count();
>>>>>>> 95b3a4c (.)

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
            Stat::make('Clock In/Out', $todayClockIns.'/'.$todayClockOuts)
=======
            Stat::make('Clock In/Out', $todayClockIns . '/' . $todayClockOuts)
>>>>>>> 95b3a4c (.)
                ->description('Today\'s clock-ins/outs')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('info'),

            Stat::make('Pending Approval', $pendingApprovals)
                ->description('Entries awaiting approval')
                ->descriptionIcon('heroicon-m-exclamation-circle')
                ->color($pendingApprovals > 0 ? 'warning' : 'success'),
        ];
    }
}
