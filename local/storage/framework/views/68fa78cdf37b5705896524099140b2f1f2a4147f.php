<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?> - Jointrust</title>
    <!-- Apex Charts -->
    <link type="text/css" href="<?php echo e(asset('local/public/vendor/apexcharts/apexcharts.css')); ?>" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Datepicker -->
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">

    <!-- Fontawesome -->
    <link type="text/css" href="<?php echo e(asset('local/public/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    
    <!-- Sweet Alert -->
    <link type="text/css" href="<?php echo e(asset('local/public/vendor/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet">
    
    <!-- Notyf -->
    <link type="text/css" href="<?php echo e(asset('local/public/vendor/notyf/notyf.min.css')); ?>" rel="stylesheet">

    <!-- Choices.js -->
    <link type="text/css" href="<?php echo e(asset('public/assets/css/choices.min.css')); ?>" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="<?php echo e(asset('public/css/volt.css')); ?>" rel="stylesheet">

    <!-- Jointrust CSS -->
    <link type="text/css" href="<?php echo e(asset('public/assets/css/jointrust.css')); ?>" rel="stylesheet">

    <?php echo \Livewire\Livewire::styles(); ?>


    <!-- Core -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Vendor JS -->
    <script src="<?php echo e(asset('public/assets/js/on-screen.umd.min.js')); ?>"></script>

    <!-- Slider -->
    <script src="<?php echo e(asset('public/assets/js/nouislider.min.js')); ?>"></script>

    <!-- Smooth scroll -->
    <script src="<?php echo e(asset('public/assets/js/smooth-scroll.polyfills.min.js')); ?>"></script>

    <!-- Apex Charts -->
    <script src="<?php echo e(asset('local/public/vendor/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- Charts -->
    <script src="<?php echo e(asset('public/assets/js/chartist.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/chartist-plugin-tooltip.min.js')); ?>"></script>

    <!-- DataTables -->
    <script src="<?php echo e(asset('public/assets/js/simple-datatables.js')); ?>"></script>

    <!-- Sweet Alerts 2 -->
    <script src="<?php echo e(asset('public/assets/js/sweetalert2.all.min.js')); ?>"></script>

    <!-- Choices.js -->
    <script src="<?php echo e(asset('public/assets/js/choices.min.js')); ?>"></script>

    <!-- Notyf -->
    <script src="<?php echo e(asset('local/public/vendor/notyf/notyf.min.js')); ?>"></script>

    <!-- Simplebar -->
    <script src="<?php echo e(asset('public/assets/js/simplebar.min.js')); ?>"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="UTF-8"></script>

    <!-- Datepicker -->
    <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    
    <!-- Volt JS -->
    <script src="<?php echo e(asset('public/assets/js/volt.js')); ?>"></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a5347400c8.js" crossorigin="anonymous"></script>



</head>

<body>

    <?php echo e($slot); ?>


    <?php echo \Livewire\Livewire::scripts(); ?>

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

        window.addEventListener('hideGift', event => {
            $("#gift").css("display","none");
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

        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            // number of slides per carousel-item
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i=1; i<minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
        
        $(document).ready(function(){

            var modals = ['createUser', 'createProduct'];

            modals.forEach(element => {
                $("#"+element).on('hidden.bs.modal', function(){
                    livewire.emit('forcedCloseModal');
                });
            });

            $('#first_time').on('hidden.bs.modal', function(){
                window.location.href = "<?php echo e(route('orders')); ?>";
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

</html><?php /**PATH C:\laragon\www\app_laravel_subir\local\resources\views/layouts/base.blade.php ENDPATH**/ ?>