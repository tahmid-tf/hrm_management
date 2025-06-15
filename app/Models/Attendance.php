<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class Attendance extends Model
{

    use SoftDeletes, HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id')->withTrashed();
    }

    protected static function booted()
    {
        static::saved(function ($attendance) {
            Cache::forget('admin_attendances');
            Cache::forget('hr_attendances');
            Cache::forget('manager_attendances');

            if ($attendance->employee_id) {
                Cache::forget("employee_attendances_{$attendance->employee_id}");
            }
        });

        static::deleted(function ($attendance) {
            Cache::forget('admin_attendances');
            Cache::forget('hr_attendances');
            Cache::forget('manager_attendances');

            if ($attendance->employee_id) {
                Cache::forget("employee_attendances_{$attendance->employee_id}");
            }
        });
    }

}
