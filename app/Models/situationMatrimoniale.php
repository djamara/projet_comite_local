<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class situationMatrimoniale extends Model
{
    //
     //
    protected $table = "situation_matrimoniale";
    protected $primarykey = 'idSitMat';
    public $incrementing = true;
    public $timestamp = false;
}
