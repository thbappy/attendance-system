<?php

namespace App\Services;

use Carbon\Carbon;

class AttendanceService
{
    public function calculate($attendance)
    {
        $shift = $attendance->shift;

        $checkIn = Carbon::parse($attendance->check_in);
        $checkOut = Carbon::parse($attendance->check_out);

        // Late check-in
        $lateLimit = Carbon::parse($shift->start_time)
            ->addMinutes($shift->late_grace_period);

        if ($checkIn->greaterThan($lateLimit)) {
            $attendance->status = "Late";
        }

        // Early leave
        $earlyLeaveLimit = Carbon::parse($shift->end_time)
            ->subMinutes($shift->early_leave_grace_period);

        if ($checkOut->lessThan($earlyLeaveLimit)) {
            $attendance->status = $attendance->status ? $attendance->status.", Early Leave" : "Early Leave";
        }

        // Total worked minutes
        $breakDuration = 0;
        if ($attendance->break_in && $attendance->break_out) {
            $breakDuration = Carbon::parse($attendance->break_in)
                ->diffInMinutes(Carbon::parse($attendance->break_out));
        }

        $attendance->worked_minutes =
            $checkIn->diffInMinutes($checkOut) - $breakDuration;

        $attendance->save();
    }
}
