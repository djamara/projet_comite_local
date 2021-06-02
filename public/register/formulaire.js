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
    
    //alert($('.ImageVolontaire').val());

    $("#formInscript").bootstrapValidator({

        message: 'This value is not valid',
        feedbackIcons: {
            /*valid: 'glyphicon glyphicon-ok',*/
            /*invalid: 'glyphicon glyphicon-remove',*/
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nomVolontaire: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'The username must be more than 1 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
        }
    })
    .on('success.form.bv', function(e) {
        // Prevent form submission
        e.preventDefault();

        // Get the form instance
        var $form = $(e.target);

        // Get the BootstrapValidator instance
        var bv = $form.data('bootstrapValidator');

        // Use Ajax to submit form data
        insertVolontaire();
    });

    /*$('#formInscript').submit(function (e){
            e.preventDefault();
            
    });*/
})

function getToken() {

    $.ajax({
        url: 'http://localhost:8000/token',
        headers: {'Access-Control-Allow-Origin': 'http://localhost'},
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            
        },
        error: function () {

        }
    });

    /*$.get('http://localhost:8000/token').done(function(data){
        alert(data);
    });*/
}

function insertVolontaire(){

    //alert($('.ImageVolontaire').val());

    // Get form
    var form = $('#formInscript')[0];

    // Create an FormData object 
    var data = new FormData(form);

    $.ajax({
        url: $('#formInscript').attr('action'),
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
                                window.location.href = '/insertVolontaire';
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