<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    //
    protected $table = "personne";
    protected $primarykey = 'idpersonne';
//    protected $primarykey = 'personne_immat';
    //public $incrementing = true;
    public $timestamp = true;
    protected $guarded = ['updated_at','created_at'];

//    public function setUpdateAttribute($value){
//
//
//    }

    public function Profession(){

        return $this->hasOne('\App\modeles\Profession','profession_idprofession');
    }

    public function Villes(){

        return $this->hasOne('Ville','personne_ville_habitation');
    }

    public function ComitePersonne()
    {
        return $this->belongsToMany('App\modeles\ComitePersonne','personneImmat');
    }
}
