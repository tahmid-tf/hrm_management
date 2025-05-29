<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class JobPosting extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function applicants()
    {
        return $this->hasMany(Applicant::class)->withTrashed();
    }
}
