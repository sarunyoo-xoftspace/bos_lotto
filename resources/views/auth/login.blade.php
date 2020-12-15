<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        {{ __('label.app_name') }}
    </title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/theme/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/theme/css/sb-admin-2.min.css') }}" rel="stylesheet">


    <style>
        .bg-gradient-primary {
            font-size: 1em;
            box-sizing: border-box;
            border: none;
            border-radius: .2em;
            height: auto;
            width: auto;
            line-height: 1.9em;
            text-transform: uppercase;
            padding: 3px 0;
            /* box-shadow: 0 3px 6px rgba(0,0,0,.16), 0 3px 6px rgba(110,80,20,.4), inset 0 -1px 2px 1px rgba(139,66,8,1), inset 0 -1px 1px 2px rgba(250,227,133,1); */
            background-image: linear-gradient(160deg, #a54e07, #b47e11, #fef1a2, #bc881b, #a54e07);
            color: rgb(120,50,5);
            text-shadow: 0 2px 2px rgba(250, 227, 133, 1);
            cursor: pointer;
            transition: all .2s ease-in-out;
            background-size: 100% 100%;
            background-position: center;
        }


    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            {{ __("label.msg_welcome") }}
                                        </h1>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}" class="user">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="email" name="email"
                                                aria-describedby="{{ __("label.page_login_username") }}"
                                                placeholder="{{ __("label.page_login_username") }}"
                                                value="{{  old("email") }}"
                                                >
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password" name="password"
                                                placeholder="{{ __('label.page_login_password') }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __("label.btn_loing") }}
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/theme/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/theme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/theme/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
