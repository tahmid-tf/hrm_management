<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{

    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

}
