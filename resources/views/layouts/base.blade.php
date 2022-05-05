<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - Jointrust</title>
    <!-- Apex Charts -->
    <link type="text/css" href="/vendor/apexcharts/apexcharts.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Datepicker -->
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="UTF-8"></script>

    <!-- Datepicker -->
    <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    
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

        window.addEventListener('showMessagge', event => {
            $('#dateOrderError').show();
        })

        window.addEventListener('notify', event => {
            
            var backgroud = '';
            var icon = '';
            switch (event.detail.type) {
                case 'success':
                    backgroud = "10B981";
                    icon = 'fas fa-check';
                break;
                case 'danger':
                    backgroud = "E11D48";
                    icon = 'fas fa-exclamation';
                break;
                case 'info':
                    backgroud = "2361CE";
                    icon = 'fas fa-info';
                break;
                default:
                    break;
            }
            
            const notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                },
                types: [
                    {
                        type: event.detail.type,
                        background: '#'+backgroud,
                        icon: {
                            className: icon,
                            tagName: 'span',
                            color: '#fff'
                        },
                        dismissible: false
                    }
                ]
            });
            notyf.open({
                type: event.detail.type,
                message: event.detail.message,
            });
        })
        
        $(document).ready(function(){

            var modals = ['createUser', 'createProduct'];

            modals.forEach(element => {
                $("#"+element).on('hidden.bs.modal', function(){
                    livewire.emit('forcedCloseModal');
                });
            });

            $('#first_time').on('hidden.bs.modal', function(){
                window.location.href = "{{ route('orders')}}";
            });

            $('#see-password').on('click',function (params) {
                if($('#password').attr('type') == 'password'){
                    $('#password').attr('type', 'text');
                    $('#pass-icon').attr('class', 'fa fa-eye-slash');
                }else{
                    $('#password').attr('type', 'password');
                    $('#pass-icon').attr('class', 'fa fa-eye');
                }
            });

            $('#see-password-confirm').on('click',function (params) {
                if($('#confirm-password').attr('type') == 'password'){
                    $('#confirm-password').attr('type', 'text');
                    $('#confirm-password-pass-icon').attr('class', 'fa fa-eye-slash');
                }else{
                    $('#confirm-password').attr('type', 'password');
                    $('#confirm-password-pass-icon').attr('class', 'fa fa-eye');
                }
            });

            $(".datepicker").on("change",function(){
                $('#dateOrderError').hide();
                let date = $(this).data('date-order');
                eval(date).set('date_order', $("#date_order").val());
            });

            $('input[name=gift_check]').on('change', function() {
                if ($(this).val() == 'si') {
                    $("#gift").css("display","block");
                }else{
                    $("#gift").css("display","none");
                    Livewire.emit('resetGitf')
                }
            });

        });

    </script>
</body>

</html>