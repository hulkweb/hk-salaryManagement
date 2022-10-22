<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'month',
        'year',
        'total_working_days',
        'total_leave_taken',
        'over_time'
    ];

    function employee(){
        return $this->belongsTo(Employee::class);
    }
    
}
