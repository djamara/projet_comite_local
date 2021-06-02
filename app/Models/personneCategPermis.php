<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class personneCategPermis extends Model
{
    //
    protected $table = 'personne_categoriepermis';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamp = false;
}
