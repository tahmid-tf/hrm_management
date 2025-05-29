<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class)->withTrashed();
    }
}
