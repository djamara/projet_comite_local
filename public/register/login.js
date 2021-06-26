$(function (){

       
    //$("#formLogin").bootstrapValidator();

    $('#formLogin').submit(function (e){
            e.preventDefault();
            //alert("on a stoppé le traitement");
            login();
    });

    /*$('#btnValideLogin').click(function(){
        login();
    });*/
})


function login(){

    // Get form
    var form = $('#formLogin')[0];

    // Create an FormData object 
    var data = new FormData(form);

    $.ajax({
        url: $('#formLogin').attr('action'),
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        //data: $('#formInscript').serialize(),
        data: data,
        //dataType: 'JSON',
        success: function (data) {
            if(data == "success"){
                swal({
                    title: "Succès",
                    text: "Vous êtes connectés, bienvenue sur notre plateforme !",
                    icon: "success",
                    button: "Ok!",
                  }).then(()=>{
                        window.location.href = '/menu';
                  });
            }else{
                $('#login').val("");
                $('#password').val("");
                
                $.confirm({
                    title: 'Echec',
                    content: 'La connexion a échoué, veuillez verifier vos accès',
                    theme:'material',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        Oui: {
                            text: 'OK',
                            btnClass: 'btn-red',
                            action: function(){
                                //window.location.href = '/menu';
                            }
                        }
                    }
                });
            }
           
        },
        error: function (e) {
            $.confirm({
                title: 'Warning',
                content: 'Une erreur est survenue lors du traitement, veuillez contactez l\'administrateur ou patienter pour réessayer plus tard',
                theme:'material',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    Oui: {
                        text: 'OK',
                        btnClass: 'btn-red',
                        action: function(){
                        }
                    }
                }
            });
        }
    })
}