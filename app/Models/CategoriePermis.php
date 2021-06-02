<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriePermis extends Model
{
    use HasFactory;

    protected $table = 'categoriepermis';
    protected $primaryKey = 'idCategorie';
    public $timestamps = false;
    protected $guarded = ['idCategorie'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
}

