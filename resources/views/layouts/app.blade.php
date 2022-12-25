<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('./style.css') }}">
    @livewireStyles
    @livewireScripts
</head>
<body>
    <div class="container-fluid nav-bg">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link {{ Request::is('/')? 'active':'' }}" aria-current="page" href="#">Home</a>
                    </li>
                    @auth
                        <livewire:logout />
                    @endauth
                    @guest 
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login')? 'active':'' }}" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register')? 'active':'' }}" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-5">           
        {{ $slot }}
    </div>    
</body>
</html>