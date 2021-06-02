$(function (){

    /*$.confirm({
        title: 'Oupsss !!',
        content: 'Une erreur est survenue lors de la sauvegarde, veuillez contactez l\'administrateur',
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
    });*/
    
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
                $.confirm({
                    title: 'Succès',
                    content: 'Votre saisie a été bien sauvegardé, voulez vous effectuer une autre saisie ?',
                    theme:'material',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        Oui: {
                            text: 'Oui',
                            btnClass: 'btn-red',
                            action: function(){
                                window.location.href = '/menu';
                            }
                        },
                        Non: {
                            text: 'Non',
                            btnClass: 'btn-gray',
                            action: function(){
                                window.location.href = '/menu';
                            }
                        }
                    }
                });
            }
           
        },
        error: function (e) {
            $.confirm({
                title: 'Warning',
                content: 'Une erreur est survenue lors de la sauvegarde, veuillez contactez l\'administrateur',
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