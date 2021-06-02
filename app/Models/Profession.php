<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model {

    //
    protected $table = 'profession';
    protected $primarykey = 'idprofession';
    public $incrementing = true;
    public $timestamp = false;

}
