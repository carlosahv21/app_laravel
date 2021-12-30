<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - Jointrust</title>
    <!-- Apex Charts -->
    <link type="text/css" href="/vendor/apexcharts/apexcharts.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker-bs4.min.css">

    <!-- Fontawesome -->
    <link type="text/css" href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    
    <!-- Sweet Alert -->
    <link type="text/css" href="/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">
    
    <!-- Notyf -->
    <link type="text/css" href="/vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Choices.js -->
    <link type="text/css" href="/assets/css/choices.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="/css/volt.css" rel="stylesheet">

    <!-- Jointrust CSS -->
    <link type="text/css" href="/assets/css/jointrust.css" rel="stylesheet">

    @livewireStyles

    <!-- Core -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- Vendor JS -->
    <script src="/assets/js/on-screen.umd.min.js"></script>

    <!-- Slider -->
    <script src="/assets/js/nouislider.min.js"></script>

    <!-- Smooth scroll -->
    <script src="/assets/js/smooth-scroll.polyfills.min.js"></script>

    <!-- Apex Charts -->
    <script src="/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Charts -->
    <script src="/assets/js/chartist.min.js"></script>
    <script src="/assets/js/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker.min.js"></script>

    <!-- DataTables -->
    <script src="/assets/js/simple-datatables.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="/assets/js/sweetalert2.all.min.js"></script>

    <!-- Choices.js -->
    <script src="/assets/js/choices.min.js"></script>

    <!-- Notyf -->
    <script src="/vendor/notyf/notyf.min.js"></script>

    <!-- Simplebar -->
    <script src="/assets/js/simplebar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Volt JS -->
    <script src="/assets/js/volt.js"></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a5347400c8.js" crossorigin="anonymous"></script>

</head>

<body>

    {{ $slot }}

    @livewireScripts
    <script>

        window.addEventListener('closeModal', event => {
            $('#'+event.detail.name).modal('hide');
        })

        window.addEventListener('openModal', event => {
            $('#'+event.detail.name).modal('show');
        })
        
        $(document).ready(function(){
            $("#createUser").on('hidden.bs.modal', function(){
                livewire.emit('forcedCloseModal');
            });

            $('#first_time').on('hidden.bs.modal', function(){
                window.location.href = "{{ route('orders')}}";
            });

            

            // funcion para duplicar una fila
            $('#duplicate').on('click', function(e) {
                var $tr = $(this).closest('tr').siblings().first();
                var allTrs = $tr.closest('table').find('tr');

                var lastTr = allTrs[allTrs.length-1];
                var $clone = $($tr).clone();

                $clone.attr('id', '');
                
                // Agregar clase para poder obtener el padre al eliminar
                $clone.addClass('itemDate');
                $clone.find('input').each(function() {
                    // Solo establecer el valor
                    this.value = '';
                    // Dejar el nombre con corchetes, para que sea un arreglo
                });
                // Agregar botón para eliminar
                $($clone).find('.hide').append('<a class="item-delete text-danger"><i class="fas fa-trash-alt"></i></a>');

                $($clone).insertAfter($tr);

            });

            // Escuchar clic en botón Agregar
            $('#item-add .button').on('click', add);

            // Escuchar clic en botones para borrar
            $(document.body).on('click', '.item-delete', removeThisFile);

            // Check buton para perfil
            $('input[name=confirm]').on('change', function(){
                var confirm = $('input[name=confirm]:checked').val();
                if(confirm == 'option1'){
                    $('#method').hide();
                }else{
                    $('#method').show();
                }
            })

        });

        function add(){
            var $tr = $(this).closest('tr').siblings().first();
            var allTrs = $tr.closest('table').find('tr');

            var lastTr = allTrs[allTrs.length-1];
            var $clone = $($tr).clone();
            // Clonar contenedor, eliminar ID
            let nuevo = $('#itemDate').clone();
            clone.attr('id', '');
            
            // Agregar clase para poder obtener el padre al eliminar
            nuevo.addClass('itemDate');
            nuevo.find('input').each(function() {
                // Solo establecer el valor
                this.value = '';
                // Dejar el nombre con corchetes, para que sea un arreglo
            });
            // Agregar botón para eliminar
            $(nuevo).append(' <button class="item-delete">X</button>');
            // Insertar nuevo contenedor antes del botón "Agregar"
            $(nuevo).insertBefore('#item-add');
        }

        // Función para eliminar
        function removeThisFile(ele) {
            // $(this) es el elemento que disparó el evento
            // ele no es el elemento, sino el evento
            // Obtener padre por clase, usando closest()
            $(this).closest('.itemDate').remove();
        }
    </script>
</body>

</html>