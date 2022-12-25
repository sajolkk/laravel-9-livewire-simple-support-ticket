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
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-5 col-md-5 offset-lg-1 ">
                <livewire:tickets />
            </div>
            <div class="col-lg-5 col-md-5">  
                <livewire:comments />
            </div>
        </div>
    </div>    
</body>
</html>