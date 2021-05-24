<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';
    public $primaryKey = 'id';
    public $timestamps = false;
}
