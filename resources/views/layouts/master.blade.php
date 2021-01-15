<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        {{  __('label.app_name') }}
        &nbsp;
        @yield('title')
    </title>

    <link href="{{ asset('assets/theme/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('assets/theme/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/toats/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/date_picker/css/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/date_picker/css/material_orange.css') }}" rel="stylesheet">
    

    @livewireStyles
</head>

<body id="page-top">

    <script src="{{ asset('assets/theme/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/theme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/theme/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/toats/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/date_picker/js/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/date_picker/i18n/th.js') }}"></script>

    <div id="wrapper">

        @include('partial.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @include('partial.topbar')

                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>
            @include('partial.footer')

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('partial.modal-logout')
  
    @livewireScripts

    <x-livewire-alert::scripts />

    @yield('js')
        
    <script type="text/javascript">
        
        displayCalendar()
        displayTimePicker()

        function displayCalendar(){
            
            console.log("Start displayCalendar .... ")
            
            $(".calendar").flatpickr({
                locale: 'th',
                dateFormat: "d M Y",
            })
        }

        function displayTimePicker(){
            
            console.log("Start displayTimePicker ....")
            
            $(".timepicker").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            })
        }

    </script>
    
</body>

</html>
