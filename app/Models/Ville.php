<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    //
    protected $table = "villes";
    protected $primarykey = 'VIL_IDENTIFIANT';
    public $incrementing = true;
    public $timestamp = false;
}
