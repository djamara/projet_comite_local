<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    //
    protected $table = 'pays_nationalite';
    protected $primarykey = 'PAYS_CODE';
    public $incrementing = true;
    public $timestamp = false;
}
