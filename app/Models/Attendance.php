<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id','shift_id','check_in','check_out',
        'break_in','break_out','status','worked_minutes'
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function shift() {
        return $this->belongsTo(Shift::class);
    }
}

