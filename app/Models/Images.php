<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    protected $table = 'image';
    protected $primarykey = 'idimage';
    public $incrementing = true;
    public $timestamp = false;
}
