<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    //
    protected $table = "comite";
    protected $primarykey = 'idcomite';
    protected $keyType = 'string';
    public $incrementing = true;
    public $timestamp = false;
}
