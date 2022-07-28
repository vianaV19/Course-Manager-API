<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'tb_course';
    public $timestamps = false;
    protected $fillable = [
        'name','description', 'code', 'duration',
        'imageUrl', 'price',
        'rating'
    ];
}
