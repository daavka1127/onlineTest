<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    public $primaryKey = 'id';
    public $timestamps = false;
}