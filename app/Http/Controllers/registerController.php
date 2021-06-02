<?php

namespace App\Http\Controllers;

use App\modeles\ComiteLocal;
use App\modeles\Commune as ModelesCommune;
use App\modeles\Fonction as ModelesFonction;
use App\modeles\Pays as ModelesPays;
use App\modeles\Ville as ModelesVille;
use App\Models\CategoriePermis;
use App\Models\Comite;
use App\Models\Commune;
use App\Models\Diplome;
use App\Models\Fonction;
use App\Models\Groupesanguin;
use App\Models\Pays;
use App\Models\Profession;
use App\Models\Typepiece;
use App\Models\Ville;
use Illuminate\Http\Request;

class registerController extends Controller
{
    //
    function index(){

        $comites = Comite::all();
        $fonctions = Fonction::all();
        $pays = Pays::all();
        $villes = Ville::all();
        $communes = Commune::all();
        $typepiece = Typepiece::all();
        $groupesanguin = Groupesanguin::all();
        $diplomes = Diplome::all();
        $professions = Profession::all();
        $categorisPermis = CategoriePermis::all();

        $arrayData = array('comites'=>$comites , 'fonctions'=>$fonctions ,
                            'pays' => $pays , 'paysNationalite'=>$pays ,'paysPere'=>$pays ,
                            'paysMere'=>$pays ,
                            'villes'=>$villes, 'communes'=>$communes ,
                            'professions'=>$professions,
                            'typePiece'=>$typepiece, 'groupesanguin'=>$groupesanguin,
                            'diplomes'=> $diplomes, 'categPermis'=>$categorisPermis );

        return view('register/index', $arrayData );
    }
}
