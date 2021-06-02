@include('header')
<div>
    <a class="btn btn-primary" href="/menu" style="font-size: 14px">Retourner au menu</a>
    <a class="btn btn-danger" href="/deconnexion" style="font-size: 14px">Se deconnecter</a>
</div>
<div class="">
    <h2 class="text text-center">Liste des volontaires</h2>
</div>
<div class="container" style="margin-top: 50px ">

    <div class="row">
        @foreach($personnes as $personne)
            <div class="col-lg-3 text-center">
                <div class="card" style="width: 18rem;">
                    <img src="{{'uploads/'.$personne->personne_immat.'/'.$personne->image_libelle}}" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$personne->personne_immat}}</h5>
                        <p class="card-text"><strong>{{$personne->personne_nom." ".$personne->personne_prenom}}</strong></p>
                        <a href="/updateVolontaire/{{$personne->idpersonne}}" class="btn btn-primary">Modifier</a>
                        <a href="#" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
