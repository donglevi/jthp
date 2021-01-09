<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model{
    protected $fillable = [
        'id_nv', 'title', 'content',
    ];
}
