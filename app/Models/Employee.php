<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name','last_name','employee_no','phone','email',
        'designation','department'
    ];

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}

