jQuery( document ).ready(function( $ ) {
    console.log( 'Envois de la requête ajax')

    var data = {
        'action': 'get_header',
    };

    $.post( ajax_object.ajax_url, data, function( response ) {
        console.log( 'Header reçu' );
        console.log( response );
    })
});