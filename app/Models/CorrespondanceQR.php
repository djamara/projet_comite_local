<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorrespondanceQR extends Model
{
    //
    protected $table = 'correspondance_fiche_qrcode';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamp = true;
}
