<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Payroll extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id')->withTrashed();
    }

    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by')->withTrashed();
    }
}
