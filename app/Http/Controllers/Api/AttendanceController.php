<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Services\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function checkIn(Request $request)
    {
        return Attendance::create([
            'employee_id' => $request->employee_id,
            'shift_id' => $request->shift_id,
            'check_in' => now()
        ]);
    }

    public function checkOut(Request $request, Attendance $attendance, AttendanceService $service)
    {
        $attendance->update([
            'check_out' => now()
        ]);

        $service->calculate($attendance);

        return $attendance;
    }

    public function breakIn(Attendance $attendance)
    {
        $attendance->update(['break_in'=>now()]);
        return $attendance;
    }

    public function breakOut(Attendance $attendance)
    {
        $attendance->update(['break_out'=>now()]);
        return $attendance;
    }

    public function report($employeeId)
    {
        return Attendance::where('employee_id',$employeeId)->get();
    }
}

