/*

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal. Contact us if you want to remove it.

*/

$(document).ready(function(){

    let inputsHidden = [ 'inputCelular', 'inputDireccion', 'inputBarrio', 'inputLocalidad', 'inputIdentificacion', 'inputPlaca' ];

    // Inputs hidden
    $.each(inputsHidden, function (idx, nameInputsHidden) {
        $( '#' + nameInputsHidden ).closest( 'div' ).hide();
    })

    $("#roleTipo").on("change",function(){
        // var inputs = [];
        var type = $(this).val() ;

        var clientsInputs = [ "inputCelular", "inputDireccion", "inputBarrio", "inputLocalidad", "inputIdentificacion" ];
        var domiciliaryInpus = [ "inputPlaca" ];

        if(type == 'client') {
            // Hidden inputs to clients
            hiddenInputs(domiciliaryInpus);

            // Show inputs to domiciliary
            showInputs(clientsInputs);

        }else if(type == 'domiciliary'){
            // Hidden inputs to domiciliary
            hiddenInputs(clientsInputs);

            // Show inputs to clients
            showInputs(domiciliaryInpus);
        }else{
            // Hidden inputs to domiciliary
            // Hidden inputs to clients
            hiddenInputs(clientsInputs);
            hiddenInputs(domiciliaryInpus);
        }
    });
});

function showInputs(arrayInputs) {
    $.each(arrayInputs , function( ind, nameInputs ) {
        $( '#' + nameInputs ).closest( 'div' ).show();
    });

}

function hiddenInputs(arrayInputs) {
    $.each(arrayInputs , function( ind, nameInputs ) {
        $( '#' + nameInputs ).closest( 'div' ).hide();
    });
}