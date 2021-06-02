<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    //
    protected $table = 'commune';
    protected $primarykey = 'idcommune';
    public $incrementing = true;
    public $timestamp = false;
}
