
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
           @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <h1><a href="{{url('/')}}"> This is Home page</a></h1>
            <ul class="list">
                <li class="list-item"><a href="{{ Route('about.us') }}">about</a> </li>
                <!-- <li class="list-item"><a href="{{ url('rimon') }}">rimon</a></li> -->
                <li class="list-item"><a href="{{Route('rimon.us')}}">rimon</a></li>
                <li class="list-item"><a href="{{ Route('contact.us') }}">contact</a></li>
                <li class="list-item"><a href="{{ Route('username.us') }}">User Name</a></li>
                <li class="list-item"><a href="{{ Route('form.us') }}">Form</a></li>

                <a href="{{Route('view.detail',Crypt::encryptString('5'))}}">rimon details</a><br>
                <a href="{{ Route('number.us',Crypt::encryptString('2022')) }}">Year Count</a>

            </ul>  
            @if(Auth::check())
            <h2>You are logged in</h2>
            @else
            <h2>You are not logged in</h2>
            @endif
            
        </div>
    </body>
</html>
