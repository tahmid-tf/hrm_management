<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $guarded = [];


//    --------------------------- Employee with user relation ---------------------------
    public function user(){
        return $this->belongsTo(User::class);
    }
}
