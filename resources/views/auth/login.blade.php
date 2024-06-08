<!DOCTYPE html>
<html lang="en" class="h-100">


<head>

    <!-- Title -->
    <title>Login</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('/homepage/img/OWB-LOGO-CC.png ') }}" type="image/x-icon">


    <!-- SEO Meta Tags -->
    <meta name="keywords" content="Mine-Tech-Lab Staking Platform, Fund Allocation">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Mine-Tech-Lab Staking Platform">
    <meta property="og:description" content="Mine-Tech-Lab Staking Platform">
    <meta property="og:image" content="{{ asset('/assets/images/10x.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mine-Tech-Lab Staking Platform">
    <meta name="twitter:description" content="Mine-Tech-Lab Staking Platform">
    <meta name="twitter:image" content="{{ asset('/assets/images/10x.jpg') }}">


    <!-- Mobile Specific -->
    <meta name="/viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link class="main-css" href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/intl-tel-input/build/css/intlTelInput.css">


</head>

<body class="vh-100">

    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">


                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="{{ route('login') }}"><img src="/homepage/assets44/images/logo.png"
                                                width="50%" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" placeholder="Email" id="email"
                                                type="email" name="email" :value="old('email')" required autofocus
                                                autocomplete="username">
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                        <label class="form-label">Password</label>
                                        <div class="mb-3 position-relative">
                                            <input id="dz-password" class="form-control" placeholder="Password"
                                                type="password" name="password" required
                                                autocomplete="current-password">
                                            <span class="show-pass eye">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        <div class="form-row d-flex justify-content-between flex-wrap mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="basic_checkbox_1" type="checkbox" name="remember">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my
                                                        preference</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            </div>

                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="mb-0">Don't have an account? <a class="text-primary"
                                                href="{{ route('register') }}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <div class="gtranslate_wrapper"></div>


    <script>
        window.gtranslateSettings = {
            "default_language": "en",
            "detect_browser_language": true,
            "wrapper_selector": ".gtranslate_wrapper",
            "horizontal_position": "left",
            "vertical_position": "top"
        }
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js" defer></script>



</body>


</html>
