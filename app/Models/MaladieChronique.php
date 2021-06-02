<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaladieChronique extends Model
{
    //
    protected $table = 'affection';
    protected $primarykey = 'idaffection';
    public $incrementing = true;
    public $timestamp = false;
}
