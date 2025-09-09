<?php

declare(strict_types=1);

namespace Modules\Employee\Policies;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\User;
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\Policies\UserBasePolicy;

class WorkHourPolicy extends UserBasePolicy
{
    

    /**
     * Determine whether the user can view any work hours.
     */
    public function viewAnyOld(UserContract $user): bool
    {
        return $user->hasPermissionTo('view_work_hours') || 
=======
use Modules\Employee\Models\WorkHour;
use Modules\User\Models\Policies\UserBasePolicy;
=======
>>>>>>> da93016 (.)
use Modules\User\Models\User;
use Modules\Employee\Models\WorkHour;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\Policies\UserBasePolicy;

class WorkHourPolicy extends UserBasePolicy
{
    

    /**
     * Determine whether the user can view any work hours.
     */
    public function viewAnyOld(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionTo('view_work_hours') ||
>>>>>>> c1ac34e (.)
=======
        return $user->hasPermissionTo('view_work_hours') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin', 'manager', 'hr']);
    }

    /**
     * Determine whether the user can view the work hour.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function viewOld(UserContract $user, WorkHour $workHour): bool
    {
        // Users can view their own work hours
        if ($user->id === $workHour->user_id) {
=======
    public function viewOld(User $user, WorkHour $workHour): bool
    {
        // Users can view their own work hours (STI: employee_id = user->id)
        if ((int) $user->id === (int) $workHour->employee_id) {
>>>>>>> c1ac34e (.)
=======
    public function viewOld(UserContract $user, WorkHour $workHour): bool
    {
        // Users can view their own work hours
        if ($user->id === $workHour->user_id) {
>>>>>>> da93016 (.)
            return true;
        }

        // Managers and admins can view all work hours
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('view_all_work_hours') || 
=======
        return $user->hasPermissionTo('view_all_work_hours') ||
>>>>>>> c1ac34e (.)
=======
        return $user->hasPermissionTo('view_all_work_hours') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin', 'manager', 'hr']);
    }

    /**
     * Determine whether the user can create work hours.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function createOld(UserContract $user): bool
    {
        return $user->hasPermissionTo('create_work_hours') || 
=======
    public function createOld(User $user): bool
    {
        return $user->hasPermissionTo('create_work_hours') ||
>>>>>>> c1ac34e (.)
=======
    public function createOld(UserContract $user): bool
    {
        return $user->hasPermissionTo('create_work_hours') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin', 'manager', 'hr', 'employee']);
    }

    /**
     * Determine whether the user can update the work hour.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function updateOld(UserContract $user, WorkHour $workHour): bool
    {
        // Users can update their own work hours within 24 hours
        if ($user->id === $workHour->user_id) {
            $hoursSinceCreation = $workHour->created_at->diffInHours(now());
            return $hoursSinceCreation <= 24;
        }

        // Managers and admins can update any work hours
        return $user->hasPermissionTo('update_all_work_hours') || 
=======
    public function updateOld(User $user, WorkHour $workHour): bool
=======
    public function updateOld(UserContract $user, WorkHour $workHour): bool
>>>>>>> da93016 (.)
    {
        // Users can update their own work hours within 24 hours
        if ($user->id === $workHour->user_id) {
            $hoursSinceCreation = $workHour->created_at->diffInHours(now());
            return $hoursSinceCreation <= 24;
        }

        // Managers and admins can update any work hours
<<<<<<< HEAD
        return $user->hasPermissionTo('update_all_work_hours') ||
>>>>>>> c1ac34e (.)
=======
        return $user->hasPermissionTo('update_all_work_hours') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin', 'manager', 'hr']);
    }

    /**
     * Determine whether the user can delete the work hour.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function deleteOld(UserContract $user, WorkHour $workHour): bool
    {
        // Users cannot delete their own work hours
        if ($user->id === $workHour->user_id) {
=======
    public function deleteOld(User $user, WorkHour $workHour): bool
    {
        // Users cannot delete their own work hours
        if ((int) $user->id === (int) $workHour->employee_id) {
>>>>>>> c1ac34e (.)
=======
    public function deleteOld(UserContract $user, WorkHour $workHour): bool
    {
        // Users cannot delete their own work hours
        if ($user->id === $workHour->user_id) {
>>>>>>> da93016 (.)
            return false;
        }

        // Only admins and managers can delete work hours
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('delete_work_hours') || 
=======
        return $user->hasPermissionTo('delete_work_hours') ||
>>>>>>> c1ac34e (.)
=======
        return $user->hasPermissionTo('delete_work_hours') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin', 'manager']);
    }

    /**
     * Determine whether the user can restore the work hour.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function restoreOld(UserContract $user, WorkHour $workHour): bool
    {
        return $user->hasPermissionTo('restore_work_hours') || 
=======
    public function restoreOld(User $user, WorkHour $workHour): bool
    {
        return $user->hasPermissionTo('restore_work_hours') ||
>>>>>>> c1ac34e (.)
=======
    public function restoreOld(UserContract $user, WorkHour $workHour): bool
    {
        return $user->hasPermissionTo('restore_work_hours') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin']);
    }

    /**
     * Determine whether the user can permanently delete the work hour.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function forceDeleteOld(UserContract $user, WorkHour $workHour): bool
    {
        return $user->hasPermissionTo('force_delete_work_hours') || 
=======
    public function forceDeleteOld(User $user, WorkHour $workHour): bool
    {
        return $user->hasPermissionTo('force_delete_work_hours') ||
>>>>>>> c1ac34e (.)
=======
    public function forceDeleteOld(UserContract $user, WorkHour $workHour): bool
    {
        return $user->hasPermissionTo('force_delete_work_hours') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin']);
    }

    /**
     * Determine whether the user can clock in/out for themselves.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function clockInOutOld(UserContract $user, ?int $targetUserId = null): bool
    {
        // If no target user specified, user is clocking for themselves
        if ($targetUserId === null || $targetUserId === $user->id) {
=======
    public function clockInOutOld(User $user, ?int $targetUserId = null): bool
    {
        // If no target user specified, user is clocking for themselves
        if ($targetUserId === null || $targetUserId === (int) $user->id) {
>>>>>>> c1ac34e (.)
=======
    public function clockInOutOld(UserContract $user, ?int $targetUserId = null): bool
    {
        // If no target user specified, user is clocking for themselves
        if ($targetUserId === null || $targetUserId === $user->id) {
>>>>>>> da93016 (.)
            return true;
        }

        // Managers can clock in/out for their team members
<<<<<<< HEAD
<<<<<<< HEAD
        return $user->hasPermissionTo('manage_team_work_hours') || 
=======
        return $user->hasPermissionTo('manage_team_work_hours') ||
>>>>>>> c1ac34e (.)
=======
        return $user->hasPermissionTo('manage_team_work_hours') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin', 'manager', 'hr']);
    }

    /**
     * Determine whether the user can view work hour reports.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function viewReportsOld(UserContract $user): bool
    {
        return $user->hasPermissionTo('view_work_hour_reports') || 
=======
    public function viewReportsOld(User $user): bool
    {
        return $user->hasPermissionTo('view_work_hour_reports') ||
>>>>>>> c1ac34e (.)
=======
    public function viewReportsOld(UserContract $user): bool
    {
        return $user->hasPermissionTo('view_work_hour_reports') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin', 'manager', 'hr']);
    }

    /**
     * Determine whether the user can export work hour data.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function exportOld(UserContract $user): bool
    {
        return $user->hasPermissionTo('export_work_hours') || 
=======
    public function exportOld(User $user): bool
    {
        return $user->hasPermissionTo('export_work_hours') ||
>>>>>>> c1ac34e (.)
=======
    public function exportOld(UserContract $user): bool
    {
        return $user->hasPermissionTo('export_work_hours') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin', 'manager', 'hr']);
    }

    /**
     * Determine whether the user can manage work hour settings.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function manageSettingsOld(UserContract $user): bool
    {
        return $user->hasPermissionTo('manage_work_hour_settings') || 
=======
    public function manageSettingsOld(User $user): bool
    {
        return $user->hasPermissionTo('manage_work_hour_settings') ||
>>>>>>> c1ac34e (.)
=======
    public function manageSettingsOld(UserContract $user): bool
    {
        return $user->hasPermissionTo('manage_work_hour_settings') || 
>>>>>>> da93016 (.)
               $user->hasRole(['admin', 'hr']);
    }
}
