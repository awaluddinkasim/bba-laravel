<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | {{ config('app.name') }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">

    <!-- Head Js -->
    <script src="{{ asset('assets/js/head.js') }}"></script>
</head>

<body class="bg-primary h-screen w-screen flex justify-center items-center">
    <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
        <div class="card overflow-hidden sm:rounded-md rounded-none">
            <form method="POST" class="px-6 py-8" autocomplete="off">
                @csrf
                <a href="/" class="flex justify-center mb-8">
                    <img class="h-6" src="{{ asset('assets/images/logo-dark.png') }}" alt="">
                </a>

                <div class="mb-4">
                    <label class="mb-2" for="LoggingEmailAddress">Email Address</label>
                    <input id="LoggingEmailAddress" class="form-input" type="email" name="email"
                        placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-4">
                    <label class="mb-2" for="loggingPassword">Password</label>
                    <input id="loggingPassword" class="form-input" type="password" name="password"
                        placeholder="Enter your password" required>
                </div>

                <div class="flex items-center mb-4">
                    <input type="checkbox" class="form-checkbox rounded" name="remember" id="checkbox-signin">
                    <label class="ms-2" for="checkbox-signin">Remember me</label>
                </div>

                <div class="flex justify-center mb-3">
                    <button class="btn w-full text-white bg-primary"> Sign In </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
