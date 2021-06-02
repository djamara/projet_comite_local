<?php

namespace App\Http\Controllers;

use App\modeles\CategPermis;
use App\Models\CategPermis as ModelsCategPermis;
use App\Models\Comite;
use App\Models\Personne;
use App\Models\Personne as ModelsPersonne;
use App\Models\personneDiplome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPJasper\PHPJasper;

class PersonneControler extends Controller {

    //
    public $Matricule;
    public $retout;
    public $retour1;
    public $retour2;

    public function genererMatricule($comite) {

        //$personne = \App\modeles\Personne::first();
        //$personne = \App\modeles\Personne::find(\DB::table('personne')->max('personne.idpersonne'));
        /*$id = \App\modeles\Personne::max('idpersonne');*/

        $codelocal = Comite::where('idcomite','=',$comite)->first();

        $id = Personne::where('comiteActuel','=',$comite)->where('personne_nouvel_adherent','OUI')->count();
        //$id = Personne::where('comiteActuel','=',$comite)->where('personne_nouvel_adherent','OUI')->count();
//      $personne = DB::table('personne')->latest()->first();
        $id = $id + 1;
        $this->Matricule = "CRCI-" . date("Y") .'-'. $codelocal->comite_code . "-" . sprintf('%04d',$id) ;
        return $this->Matricule;
    }

    public function afficherVue() {

       //dd($this->genererMatricule(80));

        $allComites = \App\Models\Comite::all();
        $allvilles = \App\Models\Ville::all();
        $communes = \App\Models\Commune::all();
        $TypePieces = \App\Models\TypePiece::all();
        $groupeSanguin = \App\Models\GroupeSanguin::all();
        $profession = \App\Models\Profession::all();
        $diplomes = \App\Models\Diplome::all();
        $pays = \App\Models\Pays::all();
        $affections = \App\Models\MaladieChronique::all();
        $comites = \App\Models\Comite::all();
        $fonctionCR = \App\Models\Fonction::all();
        $categoriePermis = \App\Models\CategPermis::all();
        $situationMatrimoniale = \App\Models\situationMatrimoniale::all();
        $lastPersonnInsert = \App\Models\Personne::latest()->first(); // recuperer le dernier inssert dans personne

        /* foreach ($allComites as $comite) {
          echo $comite->comite_libelle ."<br>";
          } */
        //$this->Matricule = $this->genererMatricule("RAF");

        return view('admin/insererVolontaire', ["comites" => $allComites, "fonctionCR" => $fonctionCR, "Matricule" => $this->Matricule,
            "villes" => $allvilles, "lastPersonnInsert" => $lastPersonnInsert,
            "paysNaiss" => $pays, "communes" => $communes, 'paysNat' => $pays, "comites" => $comites,
            "typePiece" => $TypePieces, "groupesanguin" => $groupeSanguin, "affections" => $affections,
            "profession" => $profession, "diplomes" => $diplomes, "groupesanguin" => $groupeSanguin,
            'categoriePermis' => $categoriePermis,'situationMatrimoniale'=>$situationMatrimoniale]);
    }

    public function afficherVueModif($îd) {

        //dd(Auth::user());


        $allComites = \App\Models\Comite::all();
        $allvilles = \App\Models\Ville::all();
        $communes = \App\Models\Commune::all();
        $TypePieces = \App\Models\TypePiece::all();
        $groupeSanguin = \App\Models\GroupeSanguin::all();
        $profession = \App\Models\Profession::all();
        $diplomes = \App\Models\Diplome::all();
        $pays = \App\Models\Pays::all();
        $affections = \App\Models\MaladieChronique::all();
        $comites = \App\Models\Comite::all();
        $fonctionCR = \App\Models\Fonction::all();
        $categoriePermis = \App\Models\CategPermis::all();
        $situationMatrimoniale = \App\Models\situationMatrimoniale::all();
        $lastPersonnInsert = \App\Models\Personne::latest()->first(); // recuperer le dernier inssert dans personne
        $volontaire = \App\Models\Personne::where("idpersonne", $îd)->first();
        /* $diplomes_personne = \App\modeles\Personne::addSelect([
          'personne_diplome' => function($query) {
          $query->select('diplome_iddiplome')
          ->from('personne_diplome')
          ->whereColumn('persImmat', 'personne_immat');
          }
          ])->get(); */

        //var_dump($volontaire->personne_immat);

        $diplomes_personne = \App\Models\personneDiplome::select('diplome_iddiplome')->where("persImmat", $volontaire->personne_immat)->get()->toArray();
        $diplomesVolontaire = array();

        $personneCategorie = new \App\Models\personneCategPermis();
        $perscategoriesArray = $personneCategorie->select('idcategorie')->where("personne_immat", $volontaire->personne_immat)->get()->toArray();
        $personne_categPermis = array();
        //dd($perscategoriesArray);
        //var_dump($diplomes_personne);

        foreach ($perscategoriesArray as $perscategoriesArray) {
            array_push($personne_categPermis, $perscategoriesArray["idcategorie"]);
        }

        foreach ($diplomes_personne as $diplome) {
            //var_dump($diplome);
            array_push($diplomesVolontaire, $diplome['diplome_iddiplome']);
        }

        /* foreach ($allComites as $comite) {
          echo $comite->comite_libelle ."<br>";
          } */
        //$this->Matricule = $this->genererMatricule("RAF");

        return view('register/modifier_volontaire', ["comites" => $allComites, "fonctions" => $fonctionCR, "Matricule" => $this->Matricule,
            "villes" => $allvilles, "lastPersonnInsert" => $lastPersonnInsert,
            "paysNaiss" => $pays, "communes" => $communes, 'pays' => $pays, 'paysNationalite'=>$pays ,
            "comites" => $comites, 'paysMere'=>$pays, 'paysPere'=>$pays, "diplomes"=>$diplomes , "professions"=>$profession,
            "typePiece" => $TypePieces, "groupesanguin" => $groupeSanguin, "affections" => $affections,
            "groupesanguin" => $groupeSanguin, "volontaire" => $volontaire, "diplomes_personne" => $diplomesVolontaire,
            'categPermis' => $categoriePermis, 'personneCategorie' => $personne_categPermis ,
            'situationMatrimoniale' => $situationMatrimoniale ]);
    }

    public function insererVolontaire(Request $request) {

        //if (!isset($request->input('ImageVolontaire')) && !isset($request->input('ImagePieceVolontaire'))) {
        extract($request->all());
        //var_dump($request->input('donnees'));
        //$parametre = $request->all();
        //echo json_encode($request->all());
//        extract($request->all());
        //var_dump($parametre);
//        var_dump($parametre['ImageVolontaire']);
        //$donnees = $parametre['donnees'];


        $personne = new \App\Models\Personne;
         //

        $personne->personne_numero_fiche = $numeroFiche;//enregistrer le numero de la fiche
        $personne->personne_nouvel_adherent = $EtreNouveau;//enregistrer si c'est nouvel adherent ou pas

        if(isset($EtreNouveau) && $EtreNouveau == "NON"){
            $personne->personne_immat = $numeroMatricule;
        }else{
            $this->Matricule = $this->genererMatricule($comite);
            $personne->personne_immat = $this->Matricule; //random_int(1000, 2000); //inserer immat
        }

        $personne->comiteActuel = $comite; //inserer le comité
        $personne->personne_civilite = $civilite; //inserer les civilités
        $personne->personne_nom = $nomVolontaire; // inserer le nom
        $personne->personne_prenom = $prenomVolontaire; //inserer le prenom
        $personne->personne_date_naiss = $dateNaissVolontaire; //date de naissance
        $personne->personne_pays_naiss = $paysNaiss; //pays_de_naissance
        $personne->personne_pays_nationalite = $nationalite; //pays_de_nationalite
        $personne->personne_ville_naiss = $vilNaiss; //ville de naissance
        $personne->personne_commune_naiss = $comNaiss; //commune de naissance
        $personne->personne_ville_habitation = $vilHabitVolontaire; //ville habitation
        $personne->personne_commune_habitation = $comHabitVolontaire; //commune habitattion
        $personne->lieuDeNaissance = $lieuDeNaissance; // lieu d'habitation
        $personne->personne_situation_mat = $situaMat; // situation matrimoniale du volontaire

        $personne->personne_antecedent_medic = $antecMedicVolont; //antecedent medicaux

        $personne->personne_qualification = $qualifVolontaire; //qualification
        $personne->personne_activite = $activiteVolontaire; //activite

        $personne->personne_telephone_1 = $tel1Volontaire; //telephone 1
        $personne->personne_telephone_2 = $tel2Volontaire; //telephone 2
        $personne->personne_email = $emailVolontaire; //email
        //
        $personne->TypePiece = $typePiece; //type de la piece
        $personne->NumerPiece = $numPieceVolontaire; //numero de la piece

        $personne->fonctionCR_idfonctionCR = $fonctionCR;
        $personne->profession_idprofession = $profVolontaire; //profession
        if (!empty($groupeSanguin))
            $personne->groupeSanguin = $groupeSanguin; //groupe sanguin


        //affectation de etat_pere et etat_mere
        $AvoirPermis = (isset($AvoirPermis) && $AvoirPermis != null) ? $AvoirPermis : 'NON';
        $numeroPermis = (isset($numeroPermis) && $numeroPermis != null) ? $numeroPermis : '';
        $etatMere = (isset($etatMere)&& $etatMere != null) ? $etatMere : "";
        $etatPere = (isset($etatPere) && $etatPere == null) ? $etatPere : "" ;

        $personne->personne_nom_urgence = $nomPersUrgence; //nom urgence
        $personne->personne_prenom_urgence = $prenomPersUrgence; //prenom urgence
        $personne->personne_tel_urgence = $telPersUrgence; //telephone urgence
        $personne->personne_email_urgence = $emailPersUrgence; //email urgence
        //personne->personne_profil = 1; //profil volontaire
        $personne->personne_avoir_permis = $AvoirPermis;
        $personne->personne_numero_permis = $numeroPermis;
        $personne->personne_nom_pere = $nomPereVolontaire;
        $personne->personne_prenom_pere = $prenomPereVolontaire;
        $personne->personne_nationalite_pere = $nationalitePere;
        $personne->personne_etat_pere = $etatPere;
        $personne->personne_nom_mere = $nomMereVolontaire;
        $personne->personne_prenom_mere = $prenomMereVolontaire;
        $personne->personne_nationalite_mere = $nationaliteMere;
        $personne->personne_etat_mere = $etatMere;

        $retour = $personne->save();

        // INSERER MALADIE
        //$personne->personne_affection = $maladieVolontaire;// inserer maladie

        if (!empty($maladieVolontaire)) {

            foreach ($maladieVolontaire as $maladie) {

                $personneAffection = new \App\Models\personneAffection();
                $personneAffection->personneImmat = $numeroMatricule;
                $personneAffection->idaffection = $maladie;
                $retour = $personneAffection->save();
            }
        }

        //INSERER DANS CATEGORIE PERMIS
        if ($AvoirPermis == "OUI" && !empty($categoriePermis)) {

            foreach ($categoriePermis as $categorie) {

                $personneCategorie = new \App\Models\personneCategPermis();
                $personneCategorie->personne_immat = $numeroMatricule;
                $personneCategorie->idcategorie = $categorie;
                $retour = $personneCategorie->save();
            }
        }

        //INSERER DIPLOME
        if (!empty($diplomes)) {

            foreach ($diplomes as $diplome) {

                $personneDiplome = new \App\Models\personneDiplome();
                $personneDiplome->persImmat = $numeroMatricule;
                $personneDiplome->diplome_iddiplome = $diplome;
                $retour = $personneDiplome->save();
            }
        }
        //dd($personne);


        if ($retour == true) {
            echo "succes";
            //var_dump($request->file('ImageVolontaire'));
        } else {
            echo "echec";
        }
    }

    public function uplaodFile(Request $request) {

        $typeFormalite = $request->post('typeFormalite');
        global $numeroMatricule ;
         $numeroMatricule = $request->post('numeroMatricule');

        //dd($numeroMatricule);
        //if($typeFormalite == 'inscription'){

            //$lastPersonnInsert = \App\modeles\Personne::latest()->first(); // recuperer le dernier inssert dans personne
            //$ImageVolontaire = $request->input('ImageVolontaire');
            //$ImagePieceVolontaire = $request->input('ImagePieceVolontaire');
            //$lastMatricule = $lastPersonnInsert->personne_immat; //recuperer le matricule
            //$nameDossier = str_replace("/", "-", $lastPersonnInsert); // remplacer les "/" par "-"

            if (!is_dir('uploads')) {
                mkdir('uploads');
            }

            if (!is_dir($numeroMatricule) || !file_exists($numeroMatricule)) {
                mkdir('uploads/' . $numeroMatricule);
            }
            //$matricule = $numeroMatricule;
        //}


        //$ImageVolontaire = $request->file('ImageVolontaire');
        $ImagePieceVolontaire = $request->file('ImagePieceVolontaire');

        //($ImagePieceVolontaire);

        if($ImagePieceVolontaire != null ){

            //Move Uploaded File
            $destinationPath = 'uploads/' . $numeroMatricule;
            /* ANNULER L'ENVOIE DU DEUXIEME FICHIER
            $image = new \App\modeles\Images();
            $image->image_libelle = $ImageVolontaire->getClientOriginalName();
            $image->personne_idpersonne = $lastMatricule;
            $image->image_legende = "PHOTOVOLONTAIRE";
            */

            $image2 = new \App\Models\Images();
            $image2->image_libelle = $ImagePieceVolontaire->getClientOriginalName();
            $image2->personne_idpersonne = $numeroMatricule;
            $image2->image_legende = "COPIEDELAPIECE";

            /*if ($ImageVolontaire->move($destinationPath, $ImageVolontaire->getClientOriginalName()) &&
                $ImagePieceVolontaire->move($destinationPath, $ImagePieceVolontaire->getClientOriginalName()) &&
                $image->save() && $image2->save()) {

                echo 'succes';
            } */
            if ($ImagePieceVolontaire->move($destinationPath, $ImagePieceVolontaire->getClientOriginalName())
                && $image2->save()) {

                echo 'succes';
            }
            else {
                echo 'echec';
            }
        }

    }

    public function afficherListerVolontaire() {

        //$personnes = \App\modeles\Personne::all();
        $req = "SELECT *,(SELECT commune.commune_libelle FROM commune WHERE personne.personne_commune_naiss = commune.idcommune) AS communenaissance,
               (SELECT commune.commune_libelle FROM commune WHERE personne.personne_commune_habitation = commune.idcommune) AS communehabitation
               FROM personne";

        /* $personnes = \Illuminate\Support\Facades\DB::table('personne')
          ->select(\Illuminate\Support\Facades\DB::Raw($req))
          ->get();
         */

         /*
            ->addSelect([
            'ville_naiss' => function($query) {
                $query->select('VIL_NOM')
                        ->from('villes')
                        ->whereColumn('VIL_IDENTIFIANT', 'personne_ville_naiss');
            },
            'ville_habita' => function($join) {
                $join->select('VIL_NOM')
                        ->from('villes')
                        ->whereColumn('VIL_IDENTIFIANT', 'personne_ville_habitation');
            },
            'pays_naissance' => function($pays) {
                $pays->select("PAYS_NOM")
                        ->from("pays_nationalite")
                        ->whereColumn('PAYS_CODE', 'personne_pays_naiss');
            },
            'pays_habitation' => function($paysi) {
                $paysi->select("PAYS_NOM")
                        ->from("pays_nationalite")
                        ->whereColumn('PAYS_CODE', 'personne_pays_nationalite');
            },
            'profession' => function($profession) {
                $profession->select('profession_libelle')
                        ->from('profession')
                        ->whereColumn('idprofession', 'profession_idprofession');
            },
            'communeNaiss' => function($communeNaiss) {
                $communeNaiss->select('commune_libelle')
                        ->from('commune')
                        ->whereColumn('idcommune', 'personne_commune_naiss');
            },
            'communeHabitation' => function($communeHabitation) {
                $communeHabitation->select('commune_libelle')
                        ->from('commune')
                        ->whereColumn('idcommune', 'personne_commune_habitation');
            },
            'profession' => function($profession) {
                $profession->select('profession_libelle')
                        ->from('profession')
                        ->whereColumn('idprofession', 'profession_idprofession');
            },
            'comiteLocal' => function($comite) {
                $comite->select('comite_libelle')
                        ->from('comite')
                        ->whereColumn('idcomite', 'comiteActuel');
            }
        ])->
         */

        $personnes = \App\Models\Personne::join('image','image.personne_idpersonne','=','personne.personne_immat')->where('personne_top_valide','=',1)->orderBy('idpersonne','desc')->get();

                //return view('admin/tableVolontaire', ["personnes" => $personnes]);
                return view('liste_volontaire', ["personnes" => $personnes]);
    }

    public function insertInfoGeneral(Request $request) {

        extract($request->all());

        $personne = new \App\Models\Personne;

        $personne->personne_civilite = $civilite;
        $personne->personne_nom = $nomVolontaire;
        $personne->personne_prenom = $prenomVolontaire;
        $personne->personne_date_naiss = $dateNaissVolontaire;
        $personne->personne_pays_naiss = $paysNaiss;
        $personne->personne_pays_nationalite = $nationalite;
        $personne->personne_ville_naiss = $vilNaiss;
        $personne->personne_commune_naiss = $comNaiss;
        $personne->personne_ville_habitation = $vilHabitVolontaire;
        $personne->personne_commune_habitation = $comHabitVolontaire;
        $personne->personne_affection = $maladieVolontaire;
        $personne->fonctionCR_idfonctionCR = $fonctionCR;
        $personne->profession_idprofession = $profVolontaire;


        $personne->save();
    }

    public function modifier_Volontaire(Request $request) {



        //if (!isset($request->input('ImageVolontaire')) && !isset($request->input('ImagePieceVolontaire'))) {
        extract($request->all());

        //var_dump($request->input('donnees'));
        //$parametre = $request->all();
        //echo json_encode($request->all());
//        extract($request->all());
        //var_dump($parametre);
//        var_dump($parametre['ImageVolontaire']);
        //$donnees = $parametre['donnees'];


        $personne = new \App\Models\Personne;
//        $this->Matricule = $this->genererMatricule($comite);
        $personne = $personne->all()->where("personne_immat", $matricule)->first();

        //$personne->personne_numero_fiche = $numeroFiche;//enregistrer le numero de la fiche
        $this->Matricule = $matricule;

        $etatMere = (isset($etatMere)&& $etatMere != null) ? $etatMere : "";
        $etatPere = (isset($etatPere) && $etatPere == null) ? $etatPere : "" ;

        $personne->personne_nouvel_adherent = $NouveauAgent; //inserer nouveau inscrit ou non
        $personne->comiteActuel = $comite; //inserer le comité
        $personne->personne_civilite = $civilite; //inserer les civilités
        $personne->personne_nom = $nomVolontaire; // inserer le nom
        $personne->personne_prenom = $prenomVolontaire; //inserer le prenom
        $personne->personne_immat = $this->Matricule; //random_int(1000, 2000); //inserer immat
        $personne->personne_date_naiss = $dateNaissVolontaire; //date de naissance
        $personne->personne_pays_naiss = $paysNaiss; //pays_de_naissance
        $personne->personne_pays_nationalite = $nationalite; //pays_de_nationalite
        $personne->personne_ville_naiss = $vilNaiss; //ville de naissance
        $personne->personne_commune_naiss = $comNaiss; //commune de naissance
        $personne->personne_ville_habitation = $vilHabitVolontaire; //ville habitation
        $personne->personne_commune_habitation = $comHabitVolontaire; //commune habitattion
        $personne->lieuDeNaissance = $lieuDeNaissance; // lieu d'habitation
        $personne->personne_situation_mat = $sitMatrimonial; // situation matrimoniale

        $personne->personne_antecedent_medic = $antecMedicVolont; //antecedent medicaux

        $personne->personne_qualification = $qualifVolontaire; //qualification
        $personne->personne_activite = $activiteVolontaire; //activite

        $personne->personne_telephone_1 = $tel1Volontaire; //telephone 1
        $personne->personne_telephone_2 = $tel2Volontaire; //telephone 2
        $personne->personne_telephone_3 = $tel3Volontaire; //telephone 2
        $personne->personne_quartier_habitation = $lieuHabitation; //lieu d'habitation
        $personne->personne_email = $emailVolontaire; //email
        //
        $personne->TypePiece = $typePiece; //type de la piece
        $personne->NumerPiece = $numPieceVolontaire; //numero de la piece

        $personne->fonctionCR_idfonctionCR = $fonctionCR;
        $personne->profession_idprofession = $profVolontaire; //profession
        if (!empty($groupeSanguin))
            $personne->groupeSanguin = $groupeSanguin; //groupe sanguin

        $personne->personne_nom_urgence = $nomPersUrgence; //nom urgence
        $personne->personne_prenom_urgence = $prenomPersUrgence; //prenom urgence
        $personne->personne_tel_urgence = $telPersUrgence; //telephone urgence
        $personne->personne_email_urgence = $emailPersUrgence; //email urgence
        $personne->personne_quartier_urgence = $quartierUrgence; //commune urgence

        //personne->personne_profil = 1; //profil volontaire
        $personne->personne_avoir_permis = $AvoirPermis;
        $personne->personne_numero_permis = $numeroPermis;

        $personne->personne_nom_pere = $nomPereVolontaire;
        $personne->personne_prenom_pere = $prenomPereVolontaire;
        $personne->personne_nationalite_pere = $nationalitePere;
        $personne->personne_etat_pere = $etatMere;

        $personne->personne_nom_mere = $nomMereVolontaire;
        $personne->personne_prenom_mere = $prenomMereVolontaire;
        $personne->personne_nationalite_mere = $nationaliteMere;
        $personne->personne_etat_mere = $etatMere;

        $personne->personne_niveau_etude = $niveauEtudeInfoPers;
        
        /*$personne->updated_at = date("Y-m-d H:i:s");
        $personne->created_at = date("Y-m-d H:i:s");*/

        //$personne->created_at = date("Y-m-d H:i:s");
            //return date("Y-m-d H:i:s");
//        $retour = $personne->update(["personne_immat"=>$personne_immat]);
        $retour = $personne->where("personne_immat", $this->Matricule)->update($personne->toArray());

        // UPDATE MALADIE
        //$personne->personne_affection = $maladieVolontaire;// inserer maladie

        /* if (!empty($maladieVolontaire)) {

          foreach ($maladieVolontaire as $maladie) {

          $personneAffection = new \App\modeles\personneAffection();
          $personneAffection->personneImmat = $personne_immat;
          $personneAffection->idaffection = $maladie;
          $retour = $personneAffection->save();
          }
          } */

        $personne_immat = $this->Matricule;

        //SUPPRIMER LES CATEGOERIES DE PERMIS
        $personneCategorie = new \App\Models\personneCategPermis();
        $retour = $personneCategorie->where("personne_immat", $personne_immat)->delete($personneCategorie->toArray());
        //INSERER DANS CATEGORIE PERMIS
        if ($AvoirPermis == "OUI" && !empty($categoriePermis)) {

            foreach ($categoriePermis as $categorie) {

                $personneCategorie = new \App\Models\personneCategPermis();
                $personneCategorie->personne_immat = $this->Matricule;
                $personneCategorie->idcategorie = $categorie;
                $retour = $personneCategorie->save();
            }
        }
        //UPDATE DIPLOME
        /* SUPPRIMER LES DIPLOMES INSCRIS PRECEDEMENT */
        $personneDiplome = new \App\Models\personneDiplome();
        $retour = $personneDiplome->where("persImmat", $personne_immat)->delete($personneDiplome->toArray());

        if (!empty($diplomes)) {

            foreach ($diplomes as $diplome) {

                $personneDiplome = new \App\Models\personneDiplome();
                $personneDiplome->persImmat = $personne_immat;
                $personneDiplome->diplome_iddiplome = $diplome;
                $retour = $personneDiplome->save();
            }
        }
        //dd($personne);


        if ($retour == true) {
            echo "success";
            //var_dump($request->file('ImageVolontaire'));
        } else {
            echo "echec";
        }
    }

    public function getToken() {

        $tokenArray = ["cle" => csrf_token()];
        echo json_encode($tokenArray);
    }



    public function insererFomrVolontaire(Request $request) { //methode qui insère pour la fiche volontaire

        //if (!isset($request->input('ImageVolontaire')) && !isset($request->input('ImagePieceVolontaire'))) {
        extract($request->all());
        //var_dump($request->input('donnees'));
        //$parametre = $request->all();
        //echo json_encode($request->all());
//        extract($request->all());
        //var_dump($parametre);
//        var_dump($parametre['ImageVolontaire']);
        //$donnees = $parametre['donnees'];


        $personne = new \App\Models\Personne();
        //$this->Matricule = $this->genererMatricule($comite); // on va ne génère plus le matricule mais on affecte directement à la personne en attendant
        $this->Matricule = $matricule;

        $etatMere = (isset($etatMere)&& $etatMere != null) ? $etatMere : "";
        $etatPere = (isset($etatPere) && $etatPere == null) ? $etatPere : "" ;

        $personne->personne_nouvel_adherent = $NouveauAgent; //inserer nouveau inscrit ou non
        $personne->comiteActuel = $comite; //inserer le comité
        $personne->personne_civilite = $civilite; //inserer les civilités
        $personne->personne_nom = $nomVolontaire; // inserer le nom
        $personne->personne_prenom = $prenomVolontaire; //inserer le prenom
        $personne->personne_immat = $this->Matricule; //random_int(1000, 2000); //inserer immat
        $personne->personne_date_naiss = $dateNaissVolontaire; //date de naissance
        $personne->personne_pays_naiss = $paysNaiss; //pays_de_naissance
        $personne->personne_pays_nationalite = $nationalite; //pays_de_nationalite
        $personne->personne_ville_naiss = $vilNaiss; //ville de naissance
        $personne->personne_commune_naiss = $comNaiss; //commune de naissance
        $personne->personne_ville_habitation = $vilHabitVolontaire; //ville habitation
        $personne->personne_commune_habitation = $comHabitVolontaire; //commune habitattion
        $personne->lieuDeNaissance = $lieuDeNaissance; // lieu d'habitation
        $personne->personne_situation_mat = $sitMatrimonial; // situation matrimoniale

        $personne->personne_antecedent_medic = $antecMedicVolont; //antecedent medicaux

        $personne->personne_qualification = $qualifVolontaire; //qualification
        $personne->personne_activite = $activiteVolontaire; //activite

        $personne->personne_telephone_1 = $tel1Volontaire; //telephone 1
        $personne->personne_telephone_2 = $tel2Volontaire; //telephone 2
        $personne->personne_telephone_3 = $tel3Volontaire; //telephone 2
        $personne->personne_quartier_habitation = $lieuHabitation; //lieu d'habitation
        $personne->personne_email = $emailVolontaire; //email
        //
        $personne->TypePiece = $typePiece; //type de la piece
        $personne->NumerPiece = $numPieceVolontaire; //numero de la piece

        $personne->fonctionCR_idfonctionCR = $fonctionCR;
        $personne->profession_idprofession = $profVolontaire; //profession
        if (!empty($groupeSanguin))
            $personne->groupeSanguin = $groupeSanguin; //groupe sanguin

        $personne->personne_nom_urgence = $nomPersUrgence; //nom urgence
        $personne->personne_prenom_urgence = $prenomPersUrgence; //prenom urgence
        $personne->personne_tel_urgence = $telPersUrgence; //telephone urgence
        $personne->personne_email_urgence = $emailPersUrgence; //email urgence
        $personne->personne_quartier_urgence = $quartierUrgence; //commune urgence

        //personne->personne_profil = 1; //profil volontaire
        $personne->personne_avoir_permis = $AvoirPermis;
        $personne->personne_numero_permis = $numeroPermis;

        $personne->personne_nom_pere = $nomPereVolontaire;
        $personne->personne_prenom_pere = $prenomPereVolontaire;
        $personne->personne_nationalite_pere = $nationalitePere;
        $personne->personne_etat_pere = $etatMere;

        $personne->personne_nom_mere = $nomMereVolontaire;
        $personne->personne_prenom_mere = $prenomMereVolontaire;
        $personne->personne_nationalite_mere = $nationaliteMere;
        $personne->personne_etat_mere =$etatMere;

        $personne->personne_niveau_etude = $niveauEtudeInfoPers;

        $retour = $personne->save();

        // INSERER MALADIE
        //$personne->personne_affection = $maladieVolontaire;// inserer maladie

        if (!empty($maladieVolontaire)) {

            foreach ($maladieVolontaire as $maladie) {

                $personneAffection = new \App\Models\personneAffection();
                $personneAffection->personneImmat = $this->Matricule;
                $personneAffection->idaffection = $maladie;
                $retour = $personneAffection->save();
            }
        }

        //INSERER DANS CATEGORIE PERMIS
        if ($AvoirPermis == "OUI" && !empty($categoriePermis)) {

            foreach ($categoriePermis as $categorie) {

                $personneCategorie = new \App\Models\personneCategPermis();
                $personneCategorie->personne_immat = $this->Matricule;
                $personneCategorie->idcategorie = $categorie;
                $retour = $personneCategorie->save();
            }
        }

        //INSERER DIPLOME
        if (!empty($diplomes)) {

            foreach ($diplomes as $diplome) {

                $personneDiplome = new \App\Models\personneDiplome();
                $personneDiplome->persImmat = $this->Matricule;
                $personneDiplome->diplome_iddiplome = $diplome;
                $retour = $personneDiplome->save();
            }
        }
        //dd($personne);
        //le upload de ficgiers
        if (!is_dir('uploads')) {
            mkdir('uploads');
        }
        if (!is_dir($this->Matricule)) {
            mkdir('uploads/' . $this->Matricule);
        }

        $ImageVolontaire = $request->file('ImageVolontaire');
        //$ImagePieceVolontaire = $request->file('ImagePieceVolontaire');

        //var_dump($ImageVolontaire);
        //Move Uploaded File

        $destinationPath = 'uploads/' . $this->Matricule;

        try{
             //descativer l'envoie du premier fichier
            if($ImageVolontaire != null && $ImageVolontaire->move($destinationPath, $ImageVolontaire->getClientOriginalName()) ){
                $image = new \App\Models\Images();
                $image->image_libelle = $ImageVolontaire->getClientOriginalName();
                $image->personne_idpersonne = $this->Matricule;
                $image->image_legende = "PHOTOVOLONTAIRE";


                if($image->save()){
                    return "success";
                }else{
                    return "echec";
                }
            }

        }catch(\Exception $e){
            throw $e;
        }



        /*if($ImagePieceVolontaire != null){
            $image2 = new \App\Models\Images();
            $image2->image_libelle = $ImagePieceVolontaire->getClientOriginalName();
            $image2->personne_idpersonne = $this->Matricule;
            $image2->image_legende = "COPIEDELAPIECE";
        }*/


        //dd($ImagePieceVolontaire);
        /*if ( ($ImageVolontaire->move($destinationPath, $ImageVolontaire->getClientOriginalName()) && $image->save())
            && $ImagePieceVolontaire->move($destinationPath, $ImagePieceVolontaire->getClientOriginalName())
                 && $image2->save()) {

            echo 'succes';
        }*/


        /*
        if($ImagePieceVolontaire->move($destinationPath, $ImagePieceVolontaire->getClientOriginalName())
            && $image2->save()){

            echo 'succes';
        }
        else{
            echo 'echec';
        }
        */
    }

    public function generateRapport($persnummat) {


        /*chdir("C:\\Users\User\Documents\projet-laravel\CROIX-ROUGE\croixRouge\public\");*/
        //var_dump(getcwd());

       /* \App\modeles\Images::where('personne_idpersonne','CRCI-2020-C79-47')->where('image_legende','PHOTOVOLONTAIRE')->get() */

        $input = 'C:\Users\User\Documents\projet-laravel\CROIX-ROUGE\croixRouge\public\jasperfile/fiche_croix_rouge_volontaire.jrxml';

        $jasper = new PHPJasper;
        $jasper->compile($input)->execute();

        //$input = '/jasperfile/fiche_croix_rouge_volontaire.jrxml';
        $output = 'C:\Users\User\Documents\projet-laravel\CROIX-ROUGE\croixRouge\public\rapports\/';


        $jdbc_dir = "C:/Users/User/Documents/projet-laravel/CROIX-ROUGE/croixRouge/vendor/geekcom/phpjasper/bin/jasperstarter/jdbc";

        $options = [
            'format' => ['pdf'],
            'locale' => 'en',
            'params' => [
                'imageSource' => 'C:/Users/User/Documents/projet-laravel/CROIX-ROUGE/croixRouge/public/jasperfile/',
                'numMat' => $persnummat
            ],
            'db_connection' => [
                'driver' => 'mysql', //mysql, postgres, oracle, generic (jdbc)
                'username' => 'root',
                'host' => 'localhost',
                'database' => 'croixrouge2021',
                'port' => '3306',
                'jdbc_driver' => 'com.mysql.cj.jdbc.Driver',
                'jdbc_url' => 'jdbc:mysql://localhost/croixrouge2020',
                'jdbc_dir' => $jdbc_dir
            ]
        ];

        //generer le code QR avant
        $this->genererQrcode();

        // ensuite on execute le jasper
        $jasper = new PHPJasper;

        //$rep = $jasper->process($input,$output,$options)->printOutput();
        $rep = $jasper->process($input, $output, $options)->execute();

        //if (file_exists($output.'fiche_croix_rouge_volontaire.pdf')) {
            if (chdir($output)) {
                if (rename('fiche_croix_rouge_volontaire.pdf', 'fiche_immat_'.$persnummat.'.pdf')) {
                    $pathToFile = 'fiche_immat_'.$persnummat.'.pdf';
                    $tabParam = array("persImat"=>'fiche_immat_'.$persnummat.'.pdf');
                    return view('view',$tabParam);
                } else {

                }
            }
        //}
    }

   public function genererQrcode(){
        \QrCode::size(500)
            ->format('svg')
            ->generate('www.crci.site/rapport/bonjour.pdf', public_path('jasperfile/qrcode1.svg'));
    }
    public function genererQrcodeComite($comite,$dossier,$fiche){
        $nomcompletFichier = $dossier .'/'. $fiche .'.svg';
        $chemincomplet = $dossier .'/'. $fiche;
        \QrCode::size(500)
            ->format('svg')
            ->generate('www.crci.site/'.$chemincomplet.'.pdf', public_path($nomcompletFichier));
    }

    public function renameFile($comite){
        $dossier = 'rapport/'.strtoupper($comite);

        if (is_dir($dossier)){

            $fichiers = scandir($dossier);
            //dd($fichiers);
            for ($i = 0 ; $i < sizeof($fichiers); $i++){
                if($fichiers[$i] != "." && $fichiers[$i] != ".." && pathinfo($fichiers[$i], PATHINFO_EXTENSION) == 'pdf'){
                    $fichier = $fichiers[$i];
                    //echo $fichier.' est un fichier \n';
                    $nomFiche = 'FICHE-'.strtoupper($comite).'-'.$i;
                    $newName = $dossier.'/'.$nomFiche;
                    $newNameFileQR = $dossier.'/'.$nomFiche;
                    if(!file_exists($newName)){
                        rename($dossier.'/'.$fichier,$newName.'.pdf');
                        $this->genererQrcodeComite($comite,$dossier,$nomFiche);
                        echo "le fichier a été renommé et le code généré".$fichier. "<br>";
                        continue;
                    }else if(file_exists($newName.'.pdf')){
                        $this->genererQrcodeComite($comite,$dossier,$newName);
                        echo "le code QR a été généré";
                    }
                    else{
                        echo "le fichier n'a pas été renommé ".$fichier. "<br>";
                        continue;
                    }

                }
                else{
                    //dd($fichier);
                    $i++;
                    continue;
                }
            }

        }else {
            echo "le dossier n'existe pas";
        }
    }


    function removeVolontaire(Request $request){

        extract($request->all());

        //var_dump($idVolontaire);

        $personne = new \App\Models\Personne;

        $personne = $personne->all()->where("idpersonne", $idVolontaire)->first();

        $personne->personne_top_valide = 0;

        if($personne->where("idpersonne", $idVolontaire)->update($personne->toArray())){

            echo 'succes';
        }
        else{

            echo 'echec';
        }


    }

    public function showFiche(Request $request){

        return view('rapport.fiche');
    }

}
