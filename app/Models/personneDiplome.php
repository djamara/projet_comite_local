<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class personneDiplome extends Model
{
    //
    protected $table = 'personne_diplome';
    protected $primarykey = 'diplome_iddiplome';
    public $incrementing = true;
    public $timestamp = false;
}
