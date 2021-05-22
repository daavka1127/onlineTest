<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'answer';
    public $primaryKey = 'id';
    public $timestamps = false;
}