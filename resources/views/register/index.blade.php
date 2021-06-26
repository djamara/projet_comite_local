<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('register/assets/img/favicon.ico') }}">

        <title>Material Bootstrap Wizard by Creative Tim</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="{{ asset('register/assets/img/favicon.png') }}" />

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

        <!-- CSS Files -->

        <link href="{{ asset('register/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <!--<link href="assets/css/material-kit.min.css" rel="stylesheet" />-->
        <link href="{{ asset('register/assets/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />

        <link href="{{ asset('register/assets/select2/css/select2.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('register/assets/select2/css/custom.css') }}" rel="stylesheet" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{ asset('register/assets/css/demo.css') }}" rel="stylesheet" />
        <link href="{{ asset('register/assets/css/custom.css') }}" rel="stylesheet" />

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">


        <!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>-->

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href="https://cdnjs.com/libraries/jquery.mask">
    </head>
    <body>
        <div>
            <a class="btn btn-gray" href="/menu" style="font-size: 14px">Retourner au menu</a>
            <a class="btn btn-danger" href="/deconnexion" style="font-size: 14px">Se deconnecter</a>
        </div>
        <div class="image-container set-full-height" style="background-image: url('{{ asset('register/assets/img/croixRouge.jpg') }}')">

            <!--   Creative Tim Branding   -->
            <a href="http://creative-tim.com">
                <div class="logo-container">
                    <div class="logo">
                        <img src="{{ asset('register/assets/img/new_logo.png') }}">
                    </div>
                    <div class="brand">
                        Creative Tim
                    </div>
                </div>
            </a>
            <!--  Made With Material Kit  -->
            <a href="http://demos.creative-tim.com/material-kit/index.html?ref=material-bootstrap-wizard" class="made-with-mk">
                <div class="brand">MK</div>
                <div class="made-with">Made with <strong>Material Kit</strong></div>
            </a>

            <!--   Big container   -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 ">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="red" id="wizardProfile">
                                <form action="/insererFormVolontaire" method="POST" id="formInscript" enctype="multipart/form-data">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    @csrf

                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                            FICHE D'IDENTIFICATION PERSONNELLE
                                        </h3>
                                        <h5>Ces informations vous engagent. Veuillez remplir correctement les champs</h5>
                                        <p class="text text-danger"><< Les champs marqués (*) sont obligatoires >></p>
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#etatCivil" data-toggle="tab">Etat Civil</a></li>
                                            <li><a href="#adresse" data-toggle="tab">Adresses</a></li>
                                            <li><a href="#infoPersonnelle" data-toggle="tab">Infos Personnelles</a></li>
                                            <li><a href="#filiation" data-toggle="tab">Filiation</a></li>
                                            <li><a href="#contactUrgence" data-toggle="tab">Contact d'urgence</a></li>
                                            <!--<li><a href="#adhesionCroixRouge" data-toggle="tab">Adhésion Croix Rouge</a></li>-->
                                            <li><a href="#fichiersSup" data-toggle="tab">Fichiers supplémentaires</a></li>
<!--                                            <li><a href="#confirmation" data-toggle="tab">Confirmation</a></li>-->
                                        </ul>
                                    </div>
                                    <input name="antecMedicVolont" type="hidden">
                                    <input name="profVolontaire" type="hidden">
                                    <input name="emailPersUrgence" type="hidden">
                                    <input name="antecMedicVolont" type="hidden">
                                    <div class="tab-content">
                                        <div class="tab-pane" id="etatCivil">
                                            <div class="row">
                                                <!--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>-->

                                                <div class="col-sm-4">
                                                    <div class="picture" style="height: 150px;width: 150px">
                                                            <img src="assets/img/default-avatar.png" height="150px" width="100%" class="picture-src" id="wizardPicturePreview" title=""/>
                                                            <input type="file" id="wizard-picture" name="ImageVolontaire">
                                                    </div>
                                                    <h6>Importer une photo (200x200)</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Êtes vous un nouvel inscrit ? <small class="text-danger">*</small></label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="NouveauAgent" id="radioMatricule" value="NON" checked> NON
                                                            <label class="radio-inline">
                                                                <input type="radio" name="NouveauAgent" id="radioMatricule" value="OUI"> OUI
                                                            </label>
                                                        </label><br>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Matricule <small class="text-danger">*</small></label>
                                                        <input name="matricule" id="matricule" type="text" class="form-control" placeholder="Entrez votre matricule" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Comite local<small class="text-danger">*</small></label>
                                                        <select id="paysNationnalite" class="form-control selectpicker" data-style="btn btn-link" name="comite" required>
                                                            <option></option>
                                                            <?php //$comites = getAllTable('comite');
                                                            foreach ($comites as $comite): ?>
                                                                <option value="<?php echo $comite['idcomite']?>"><?php echo $comite['comite_libelle']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Fonction<small class="text-danger">*</small></label>
                                                        <select id="paysNationnalite" class="form-control selectpicker" data-style="btn btn-link" name="fonctionCR" required>
                                                            <option></option>
                                                            <?php //$fonctions = getAllTable('fonctioncr');
                                                            foreach ($fonctions as $fonction): ?>
                                                                <option value="<?php echo $fonction['idfonctionCR']?>"><?php echo $fonction['fonctionCR_libelle']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Nom <small class="text-danger">*</small></label>
                                                        <input name="nomVolontaire" id="nomVolontaire" type="text" class="form-control" placeholder="Entrez votre nom" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Prénom(s) <small class="text-danger">*</small></label>
                                                        <input name="prenomVolontaire" id="prenom" placeholder="Entrez vos prénoms" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Date de naissance <small class="text-danger">*</small></label>
                                                        <input id="dateNaissance" name="dateNaissVolontaire" type="date" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Civilité <small class="text-danger">*</small></label>
                                                        <select class="form-control selectpicker" name="civilite" data-style="btn btn-link" id="sexe" required>
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mlle">Mlle</option>
                                                            <option value="Mme">Mme</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Situation matrimoniale <small class="text-danger">*</small></label>
                                                        <select class="form-control selectpicker" name="sitMatrimonial" data-style="btn btn-link" id="sitMatrimonial" required>
                                                            <option></option>
                                                            <option value="0">Celibataire</option>
                                                            <option value="1">Marié(e)</option>
                                                            <option value="2">Veuf(ve)</option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <!--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>-->



                                            </div>

                                            <div class="row">
                                                <!--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>-->
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Pays de naissance <small class="text-danger">*</small></label>
                                                        <select id="paysNationnalite" name="paysNaiss" class="form-control selectpicker" data-style="btn btn-link" required>
                                                            <option></option>
                                                            <?php //$pays = getAllTable('pays_nationalite');
                                                            foreach ($pays as $pays): ?>
                                                                <option value="<?php echo $pays['PAYS_CODE']?>" <?php if($pays['PAYS_CODE'] == "CIV"){ echo "selected" ;} ?> >
                                                                    <?php echo $pays['PAYS_NOM']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Ville de naissance <small class="text-danger">*</small></label>
                                                        <select id="paysNationnalite" name="vilNaiss" class="form-control selectpicker" data-style="btn btn-link" required>
                                                            <option></option>
                                                            <?php //$villes = getAllTable('villes');
                                                            foreach ($villes as $ville): ?>
                                                                <option value="<?php echo $ville['VIL_IDENTIFIANT']?>"><?php echo $ville['VIL_NOM']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Commune de naissance <small class="text-danger">*</small></label>
                                                        <select id="paysNationnalite" name="comNaiss" class="form-control selectpicker" data-style="btn btn-link" required>
                                                            <option></option>
                                                            <?php //$communes = getAllTable('commune');
                                                            foreach ($communes as $commune): ?>
                                                                <option value="<?php echo $commune['idcommune']?>"><?php echo $commune['commune_libelle']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label class="control-label">Lieu de naissance<small class="text-danger">*</small></label>
                                                        <input id="commune" name="lieuDeNaissance" placeholder="Entrer la commune ou le quartier" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>-->
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Pays de nationalité <small class="text-danger">*</small></label>
                                                        <select id="paysNationnalite" name="nationalite" class="form-control selectpicker" data-style="btn btn-link">
                                                            <option></option>
                                                            <?php //$pays = getAllTable('pays_nationalite');
                                                            foreach ($paysNationalite as $pays): ?>
                                                                <option value="<?php echo $pays['PAYS_CODE']?>" <?php if($pays['PAYS_CODE'] == "CIV"){ echo "selected" ;} ?>><?php echo $pays['PAYS_NOM']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Type de pièce <small class="text-danger">*</small></label>
                                                        <select class="form-control selectpicker" name="typePiece" data-style="btn btn-link" id="typePiece">
                                                            <option></option>
                                                            <?php //$typePiece = getAllTable('typepiece');
                                                            foreach ($typePiece as $typePiece):?>
                                                            <option value="<?php echo $typePiece['idTypePiece']?>">
                                                                <?php echo $typePiece['libelleTypePiece']?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">N° de pièce <small class="text-danger">*</small></label>
                                                        <input id="numPiece" name="numPieceVolontaire" placeholder="Entrez le numero de la pièce" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>-->
                                                <div class="col-sm-4"></div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Groupe sanguin <!--<small class="text-danger">*</small>--></label>
                                                        <select class="form-control selectpicker" name="groupeSanguin" data-style="btn btn-link" id="groupeSanguin">
                                                            <option></option>
                                                            <?php //$gs = getAllTable('groupesanguin') ;?>
                                                            <?php foreach ($groupesanguin as $groupesanguin):?>
                                                                <option value="<?php echo $groupesanguin['idGroupeSanguin']?>">
                                                                    <?php echo $groupesanguin['libelleGroupeSanguin']?>
                                                                </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="adresse">
                                            <!--<h4 class="info-text"> Adresses géographiques et électroniques </h4>-->
                                            <div class="row">
                                                <!--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>-->

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Ville habitation <!--<small class="text-danger">*</small>--></label>
                                                        <select id="paysNationnalite" name="vilHabitVolontaire" class="form-control selectpicker" data-style="btn btn-link" required>
                                                            <option></option>
                                                            <?php //$villes = getAllTable('villes');
                                                            foreach ($villes as $ville): ?>
                                                                <option value="<?php echo $ville['VIL_IDENTIFIANT']?>"><?php echo $ville['VIL_NOM']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Commune d'habitation <!--<small class="text-danger">*</small>--></label>
                                                        <select id="paysNationnalite" name="comHabitVolontaire" class="form-control selectpicker" data-style="btn btn-link" required>
                                                            <option></option>
                                                            <?php //$communes = getAllTable('commune');
                                                            foreach ($communes as $commune): ?>
                                                                <option value="<?php echo $commune['idcommune']?>"><?php echo $commune['commune_libelle']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Code postale <!--<small class="text-danger">*</small>--></label>
                                                        <input name="codepostale" id="codePostale" placeholder="Entrez le code postale" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label class="control-label">Quartier habitation <small class="text-danger">*</small></label>
                                                        <input id="commune" name="lieuHabitation" placeholder="Entrer la commune ou le quartier" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>-->
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Téléphone fixe <!--<small class="text-danger">*</small>--></label>
                                                        <input name="tel1Volontaire" id="tel1Volontaire" placeholder="Entrez le numéro de téléphone fixe" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Téléphone mobile money <small class="text-danger">*</small></label>
                                                        <input name="tel2Volontaire" id="telportAdrGeo" placeholder="Entrez le numéro de téléphone portable" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Email <small class="text-danger">*</small></label>
                                                        <input name="emailVolontaire" id="emailAdrGeo" placeholder="Entrez l'adresse email" type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Numéro WhatsApp <!--<small class="text-danger">*</small>--></label>
                                                        <input name="tel1Volontaire" id="tel1Volontaire" placeholder="Entrez le numéro WhatsApp" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="infoPersonnelle">
                                            <!--<h4 class="info-text"> Cursus scolaire et professionnel </h4>-->
                                            <div class="row">
                                                <!--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>-->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Dimplôme(s) obtenu(s) <!--<small class="text-danger">*</small>--></label>
                                                        <!-- <select class="select2 form-control selectpicker" data-style="btn btn-link" id="diplomeInfoPers">
                                                            <option value="">-- Selectionner une option --</option>
                                                            <option>BEPC</option>
                                                            <option>BAC</option>
                                                            <option>BTS</option>
                                                            <option>Licence</option>
                                                            <option>Matser</option>
                                                            <option>Doctorat</option>
                                                        </select> -->
                                                         <label class="checkbox-inline">
                                                             <?php //$diplomes = getAllTable('diplome');?>
                                                            <?php foreach ($diplomes as $diplome):?>
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="diplomes[]" id="" value="<?php echo $diplome['iddiplome']?>">
                                                                    <?php echo $diplome['diplome_libelle']?>
                                                                </label>
                                                             <?php endforeach;?>
                                                        </label><br>
                                                    </div>
                                                    <label class="control-label">Si votre profession n'est pas listé, veuillez la saisir svp :
                                                    </label>

                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Niveau d'étude <!--<small class="text-danger">*</small>--></label>
                                                        <input name="niveauEtudeInfoPers" id="niveauEtudeInfoPers" placeholder="Ex: Bac+2" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Profession<small class="text-danger">*</small></label>
                                                        <select id="paysNationnalite" name="profession" class="form-control selectpicker" data-style="btn btn-link">
                                                            <option></option>
                                                            <?php //$communes = getAllTable('commune');
                                                            foreach ($professions as $profession): ?>
                                                                <option value="<?php echo $profession['idprofession']?>"><?php echo $profession['profession_libelle']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Qualification professionnelle <!--<small class="text-danger">*</small>--></label>
                                                        <input name="qualifVolontaire" id="qualifProfInfoPers" placeholder="Entrez la qualification professionnelle" type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Êtes-vous présentement en activité ?: <small class="text-danger">*</small></label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="activite" value="non" id="radioActiviteNon" checked> NON
                                                            <label class="radio-inline">
                                                                <input type="radio" name="activite" id="radioActiviteOui" value="oui"> OUI
                                                            </label>
                                                        </label><br>
                                                        <div id="panelPrecisionActivite">
                                                            <label class="control-label">Préciser l'activité <small class="text-danger">*</small></label>
                                                            <input name="activiteVolontaire" id="activiteInfoPers" placeholder="Renseigner la/les activités exercée(s)" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Avez-vous un permis de conduire ?: <small class="text-danger">*</small></label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="AvoirPermis" id="radioPermisNon" value="NON" checked> NON
                                                            <label class="radio-inline">
                                                                <input type="radio" name="AvoirPermis" id="radioPermisOui" value="OUI"> OUI
                                                            </label>
                                                        </label><br>
                                                        <div id="panelPrecisionNumPermis">
                                                            <label class="control-label">N° du permis <small class="text-danger">*</small></label>
                                                            <input name="numeroPermis" id="numPermisInfoPers" placeholder="Entrez le numéro du permis" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4" id="panelPrecisionCatPermis">
                                                    <div class="form-group">
                                                        <label class="control-label">Catégorie du permis <small class="text-danger">*</small></label>
                                                        <br>
                                                        <?php //$categPermis = getAllTable('categoriepermis');?>
                                                        <?php foreach ($categPermis as $categoPermi):?>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="categoriePermis[]" value=" <?php echo $categoPermi['idCategorie']?>" id="cbPermisCatA">
                                                            <?php echo $categoPermi['categorie_libelle']?>
                                                        </label>
                                                        <?php endforeach;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="filiation">
                                            <!--<h4 class="info-text"> Informations relatives aux parents </h4>-->
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Nom du père <small class="text-danger">*</small></label>
                                                        <input name="nomPereVolontaire" id="nomPere" placeholder="Entrez le nom du père" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Prénom(s) du père <small class="text-danger">*</small></label>
                                                        <input name="prenomPereVolontaire" id="prenomPere" placeholder="Entrez le prénom du père" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Nationnalité <small class="text-danger">*</small></label>
                                                        <select name="nationalitePere" id="paysNationnalite" class="form-control selectpicker" data-style="btn btn-link">
                                                           @foreach ($paysMere as $pays)
                                                                <option value="<?php echo $pays['PAYS_CODE']?>" <?php if($pays['PAYS_CODE'] == "CIV"){ echo "selected" ;} ?> > <?php echo $pays['PAYS_NOM']?> </option>
                                                            @endforeach
                                                        </select>
                                                        <label class="checkbox-inline">
                                                                <input type="checkbox" name="etatPere" value="decede" id="" value="oui"> Cochez si décédé
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Nom de la mère <small class="text-danger">*</small></label>
                                                        <input name="nomMereVolontaire" id="nomMere" placeholder="Entrez le prénom de la mère" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Prénom(s) de la mère <small class="text-danger">*</small></label>
                                                        <input type="text" name="prenomMereVolontaire" id="prenomMere" placeholder="Entrez le prénom de la mère" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Nationnalité <small class="text-danger">*</small></label>
                                                        <select name="nationaliteMere" id="paysNationnalite" class="form-control selectpicker" data-style="btn btn-link">

                                                            @foreach ($paysMere as $pays)
                                                                <option value="<?php echo $pays['PAYS_CODE']?>" <?php if($pays['PAYS_CODE'] == "CIV"){ echo "selected" ;} ?> ><?php echo $pays['PAYS_NOM']?></option>
                                                            @endforeach
                                                        </select>
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="etatMere" id="" value="decede"> Cochez si décédé
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="contactUrgence">
                                            <!--<h4 class="info-text"> Personne à contacter en cas d'urgence </h4>-->
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Nom <small class="text-danger">*</small></label>
                                                        <input name="nomPersUrgence" id="nomUrgence" placeholder="Entrez le nom" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Prénom(s) <small class="text-danger">*</small></label>
                                                        <input name="prenomPersUrgence" type="text" id="prenomUrgence" placeholder="Entrez le prénom" class="form-control">
                                                    </div>
                                                </div>
                                                <!--<div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Ville d'habitatiopn <small class="text-danger">*</small></label>
                                                        <select class="form-control selectpicker" data-style="btn btn-link" id="villeUrgence">
                                                            <option value=""></option>
                                                                <?php /*$villes = getAllTable('villes');
                                                                foreach ($villes as $ville): */?>
                                                                    <option value="<?php /*echo $ville['VIL_NOM']*/?>"><?php /*echo $ville['VIL_NOM']*/?></option>
                                                                <?php /*endforeach; */?>
                                                        </select>
                                                    </div>
                                                </div>-->
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Commune / Quartier d'habitation <small class="text-danger">*</small></label>
                                                        <input name="quartierUrgence" id="quartierUrgence" placeholder="Entrez la commune ou le quartier" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <!--<div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Code postale</label>
                                                        <input type="text" id="codePostaleUrgence" placeholder="Entrez le code postale" class="form-control">
                                                    </div>
                                                </div>-->
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Téléphone 1 <small class="text-danger">*</small></label>
                                                        <input name="telPersUrgence" type="tel" id="tel1Urgence" placeholder="Entrez le numero de téléphone 1" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Téléphone 2 <!--<small class="text-danger">*</small>--></label>
                                                        <input name="telPersUrgence" type="tel" id="tel2Urgence" placeholder="Entrez le numero de téléphone 2" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php /*
                                          <div class="tab-pane" id="adhesionCroixRouge">
                                          <!--<h4 class="info-text"> Are you living in a nice area? </h4>-->
                                          <div class="row">
                                          <div class="col-sm-6">
                                          <div class="form-group">
                                          <label class="control-label">Immatriculé le <small class="text-danger">*</small></label>
                                          <input name="codepostale" type="date" id="dateImmat" class="form-control">
                                          </div>
                                          </div>
                                          <div class="col-sm-6">
                                          <div class="form-group">
                                          <label class="control-label">Structure <small class="text-danger">*</small></label>
                                          <input name="what" type="text" id="structure" placeholder="Entrez la structure" class="form-control">
                                          </div>
                                          </div>
                                          </div>
                                          <div class="row">
                                          <div class="col-sm-6">
                                          <div class="form-group">
                                          <label class="control-label">Quitté la base le <!--<small class="text-danger">*</small>--></label>
                                          <input name="what" type="date" id="dateSortie" class="form-control">
                                          </div>
                                          </div>
                                          <div class="col-sm-6">
                                          <div class="form-group">
                                          <label class="control-label">Motifs de sortie <!--<small class="text-danger">*</small>--></label>
                                          <textarea class="form-control" id="motifSortie" placeholder="Entrez le motif de sortie"></textarea>
                                          </div>
                                          </div>
                                          </div>
                                          </div> */
                                        ?>
                                        <div class="tab-pane" id="fichiersSup">
                                            <div class="row">
                                                <!--<h4 class="info-text"> Let's start with the basic information (with validation)</h4>-->
                                                <div class="col-sm-4">
                                                    <div class="picture" style="height: 150px;width: 150px">
                                                        <img src="assets/img/default-avatar.png" height="150px" width="100%" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="ImagePieceVolontaire">
                                                    </div>
                                                    <h6>Importer une photo (200x200)</h6>
                                                </div>
                                                <div class="col-sm-8">
                                                    <fieldset>
                                                        <legend>Importer tout autre document suplémentaire</legend>
                                                            <label>Copie de la pièce d'identité</label>
                                                            <input type="file"/>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-8">
                                                    <fieldset>
                                                        <legend>Importer tout autre document suplémentaire</legend>
                                                        <label>Copie de la pièce d'identité</label>
                                                        <input type="file"/>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="tab-pane" id="confirmation">

                                        </div>-->
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Suivant' />
                                            <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Confirmer' />
                                        </div>

                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Précédent' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- wizard container -->
                    </div>
                </div><!-- end row -->
            </div> <!--  big container -->

            <div class="footer">
                <div class="container text-center">
                    Made with <i class="fa fa-heart heart"></i> by <a href="http://www.horebline.com">HOREB LINE</a>.
                </div>
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="{{ asset('register/assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('register/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('register/assets/js/jquery.bootstrap.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

        <script src="{{ asset('register/formulaire.js') }}" ></script>
        <!--  Plugin for the Wizard -->
        <script src="{{ asset('register/assets/js/material-bootstrap-wizard.js') }}"></script>
        <!--<script src="assets/js/bootstrap-material-design.min.js" type="text/javascript"></script>-->

        <script src="{{ asset('register/assets/select2/js/select2.min.js') }}"></script>

        <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
        <script src="{{ asset('register/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('register/assets/js/custom.js') }}"></script>
    </body>

</html>
