<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePiece extends Model
{
    //
    protected $table = 'typepiece';
    protected $primarykey = 'idTypePiece';
    public $incrementing = true;
    public $timestamp = false;
}
