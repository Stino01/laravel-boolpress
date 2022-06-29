<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <title>HomePage</title>
</head>
<body>
    <div class="flex-cemter position-ref fill-height">
        @if (Route::has('login'))
            <div class="top-rigth links">
                @auth
                    <a href="{{ url('/admin') }}">Home</a>           
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div id="root"></div>
    
    <script src="{{asset('js/front.js')}}"></script>
</body>
</html>
