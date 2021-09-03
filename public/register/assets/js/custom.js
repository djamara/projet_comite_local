/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Recuperation des elements du formulaire
$(document).ready(function () {

    //alert('je suis dans le bon fichier');

    nom = $('#nom');
    prenom = $('#prenom');
    dateNaissance = $('#dateNaissance');
    lieuNaissance = $('#lieuNaissance');
    sexe = $('#sexe');
    paysNationnalite = $('#paysNationnalite');
    typePiece = $('#typePiece');
    numPiece = $('#numPiece');
    villeHabitation = $('#villeHabitation');
    commune = $('#commune');
    situationMat = $('#situationMat');
    groupeSanguin = $('#groupeSanguin');
    codePostale = $('#codePostale');
    villeAdrGeo = $('#villeAdrGeo');
    telFixeAdrGeo = $('#telFixeAdrGeo');
    telportAdrGeo = $('#telportAdrGeo');
    emailAdrGeo = $('#emailAdrGeo');
    numWhatAdrGeo = $('#numWhatAdrGeo');
    diplomeInfoPers = $('#diplomeInfoPers');
    niveauEtudeInfoPers = $('#niveauEtudeInfoPers');
    qualifProfInfoPers = $('#qualifProfInfoPers');
    radioActiviteNon = $('#radioActiviteNon');
    radioActiviteOui = $('#radioActiviteOui');
    activiteInfoPers = $('#activiteInfoPers');
    radioPermisNon = $('#radioPermisNon');
    radioPermisOui = $('#radioPermisOui');
    numPermisInfoPers = $('#numPermisInfoPers');
    cbPermisCatA = $('#cbPermisCatA');
    cbPermisCatB = $('#cbPermisCatB');
    cbPermisCatC = $('#cbPermisCatC');
    cbPermisCatD = $('#cbPermisCatD');
    cbPermisCatE = $('#cbPermisCatE');
    cbPermisCatF = $('#cbPermisCatF');
    categoriePermisInfoPers = $('#categoriePermisInfoPers');
    nomPere = $('#nomPere');
    prenomPere = $('#prenomPere');
    nationnalitePere = $('#nationnalitePere');
    nomMere = $('#nomMere');
    prenomMere = $('#prenomMere');
    nationnaliteMere = $('#nationnaliteMere');
    nomUrgence = $('#nomUrgence');
    prenomUrgence = $('#prenomUrgence');
    villeUrgence = $('#villeUrgence');
    communeUrgence = $('#communeUrgence');
    codePostaleUrgence = $('#codePostaleUrgence');
    tel1Urgence = $('#tel1Urgence');
    tel2Urgence = $('#tel2Urgence');

    panelPrecisionActivite = $('#panelPrecisionActivite');
    panelPrecisionNumPermis = $('#panelPrecisionNumPermis');
    panelPrecisionCatPermis = $('#panelPrecisionCatPermis');

    //On cache par defaut les champs detail activite
    // et detail du permis de conduire
    init();

    radioActiviteOui.click(function () {
        panelPrecisionActivite.show(500);
    });
    radioActiviteNon.click(function () {
        panelPrecisionActivite.hide(500);
    });

    radioPermisOui.click(function () {
        panelPrecisionNumPermis.show(500);
        panelPrecisionCatPermis.show(500);
    });
    radioPermisNon.click(function () {
        numPermisInfoPers.val('');
        panelPrecisionNumPermis.hide(500);
        panelPrecisionCatPermis.hide(500);
    });


    console.log($("#wizard-picture"));
});

function init() {
    panelPrecisionActivite.hide();
    checkedPermis();
    /*panelPrecisionNumPermis.hide();
    panelPrecisionCatPermis.hide();*/
}

function checkedPermis(){

    if(radioPermisOui.val('OUI')){
        panelPrecisionNumPermis.show(500);
        panelPrecisionCatPermis.show(500);
    }
}
