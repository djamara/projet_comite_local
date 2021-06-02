<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategPermis extends Model
{
    //
    protected $table = 'categoriepermis';
    protected $primarykey = 'idCategorie';
    public $incrementing = true;
    public $timestamp = false;
}
