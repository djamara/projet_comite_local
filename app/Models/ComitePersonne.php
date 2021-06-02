<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComitePersonne extends Model
{
    //
    protected $table = "comite_has_personne";
    protected $primarykey = 'idComitePersonne';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamp = false;
}
