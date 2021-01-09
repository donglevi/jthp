<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryCol extends Model{
    protected $fillable = [
        'id_nv', 'month', 'salary_col', 'salary_value',
    ];
}
