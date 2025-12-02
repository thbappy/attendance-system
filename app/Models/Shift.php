<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'name','start_time','end_time',
        'break_duration','late_grace_period','early_leave_grace_period'
    ];

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}

