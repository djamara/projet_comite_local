$(function (){

    //getToken();
    // $("#formInscript").bootstrapValidator();

    /*$('#formInscript').submit(function (e){
            e.preventDefault();
            insertVolontaire();
    });*/
})

function getToken() {

    $.ajax({
        url: 'http://localhost:8000/token',
        headers: {'Access-Control-Allow-Origin': 'http://localhost'},
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            alert(data);
        },
        error: function () {

        }
    });

    /*$.get('http://localhost:8000/token').done(function(data){
        alert(data);
    });*/
}

function insertVolontaire(){
    $.ajax({
        url: 'http://localhost:8000/inserer_Volontaire',
        type: 'POST',
        data: $('#formInscript').serialize(),
        dataType: 'JSON',
        success: function (data) {
            alert(data);
        },
        error: function () {
            alert("echec poto");
        }
    })
}