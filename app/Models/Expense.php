<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id')->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id')->withTrashed();
    }

}
