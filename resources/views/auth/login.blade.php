<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banners Systems</title>



    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('auth/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
</head>

<body class="signin_body">

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signin-content">
                    <form method="POST" action="{{ route('login') }}" class="signup-form">
                        @csrf

                        <h2 class="form-title">Banners System</h2>


                        <h2 class="form-title">Sign In</h2>



                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email"
                                placeholder="Your Email" />
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password"
                                placeholder="Password" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>



                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign In" />
                        </div>
                    </form>

                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/main.js') }}"></script>
</body>

</html>
