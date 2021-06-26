@include('header')

<div class="">
    <h2 class="text text-center">Menu</h2>
</div>
<div class="row col-lg-12" style="margin-top: 50px ">

    <div class="col-lg-4 text-center">
        <div>
            <img src="{{ asset('icons/deconnexion.png') }}" width="250px" class="img img-responsive rounded" alt="la liste des volontaires">
        </div>
        <div class="">
            <a href="/"><h3 class="text">Deconnexion</h3></a>
        </div>
    </div>
    <div class="col-lg-4 text-center">
        <div>
            <img src="{{ asset('icons/user_team.png') }}" width="250px" class="img img-responsive rounded" alt="la liste des volontaires">
        </div>
        <div class="">
            <a href="/insertVolontaire"><h3 class="text">Saisir volontaire</h3></a>
        </div>
    </div>
    <div class="col-lg-4 text-center">
        <div class="">
            <img src="{{ asset('icons/users.png') }}" width="250px" class="img img-responsive rounded" alt="la liste des volontaires">
        </div>
        <div class="">
            <a href="/afficher_liste"><h3 class="text">Afficher liste volontaires</h3></a>
        </div>
    </div>
    <div class="col-lg-4 text-center">
        <div class="">
            <img src="{{ asset('icons/activite3.png') }}" width="250px" height="250px" class=" img img-responsive rounded" alt="la liste des volontaires">
        </div>
        <div class="">
            <a href=""><h3 class="text">Activités</h3></a>
        </div>
    </div>
    <div class="col-lg-4 text-center">
        <div class="">
            <img src="{{ asset('icons/config1.png') }}" width="250px" class=" img img-responsive rounded" alt="la liste des volontaires">
        </div>
        <div class="">
            <a href=""><h3 class="text">Configuration</h3></a>
        </div>
    </div>
    
</div>
