<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryIncrement extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id')->withTrashed();
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by')->withTrashed();
    }
}
