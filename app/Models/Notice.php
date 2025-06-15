<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Notice extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];


    public function publisher()
    {
        return $this->belongsTo(User::class, 'published_by')->withTrashed();
    }

    protected static function booted()
    {
        static::saved(function ($notice) {
            // Optional: clear for all known roles or smartly clear one
            self::clearRoleCaches();
        });

        static::deleted(function ($notice) {
            self::clearRoleCaches();
        });
    }

    protected static function clearRoleCaches()
    {
        $roles = ['admin', 'hr', 'manager', 'employee']; // Add any other roles as needed

        foreach ($roles as $role) {
            Cache::forget("admin_notices_{$role}");
            Cache::forget("hr_notices_{$role}");
            Cache::forget("manager_notices_{$role}");
            Cache::forget("employee_notices_{$role}");
        }
    }
}
