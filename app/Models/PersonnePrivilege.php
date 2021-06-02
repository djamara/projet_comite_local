<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnePrivilege extends Model
{
    //
    protected $table = 'personne_privilege';
    protected $primarykey = 'idPersonne_privilege';
    public $incrementing = true;
    public $timestamp = false;
}
