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

window.addEventListener("load", () => { // when the page loads
    const inputsHidden = ['inputCelular', 'inputCumpleanios','inputDireccion', 'inputBarrio', 'inputLocalidad', 'inputCiudad','inputMunicipio', 'inputIdentificacion', 'inputPlaca'];    
   
    inputsHidden.forEach((element) => {
        document.getElementById(element).closest('div').classList.remove('d-block')
        document.getElementById(element).closest('div').classList.add('d-none')
    })
  
    document.getElementById('roleTipo').addEventListener('change', function () {
        let type = this.value;
   
        let clientsInputs = [ "inputCelular", "inputCumpleanios", "inputDireccion", "inputBarrio", "inputLocalidad", "inputCiudad", "inputMunicipio","inputIdentificacion" ];
        let domiciliaryInpus = [ "inputPlaca" ];
        
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
        }else {
            // Hidden inputs to domiciliary
            // Hidden inputs to clients
            hiddenInputs(clientsInputs);
            hiddenInputs(domiciliaryInpus);
        }
    })
})
 
function showInputs(arrayInputs) {
    arrayInputs.forEach((element) => {
        document.getElementById(element).closest('div').classList.remove('d-none')
        document.getElementById(element).closest('div').classList.add('d-block')
    })
}

function hiddenInputs(arrayInputs) {
    arrayInputs.forEach((element) => {         
        document.getElementById(element).closest('div').classList.remove('d-block')
        document.getElementById(element).closest('div').classList.add('d-none')
    })
}