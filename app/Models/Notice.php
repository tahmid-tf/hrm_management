<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function publisher()
    {
        return $this->belongsTo(User::class, 'published_by')->withTrashed();
    }
}
