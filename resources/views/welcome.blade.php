<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @livewireStyles
    @livewireScripts
</head>
<body>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem vel laboriosam ut nam, commodi quisquam et ad perspiciatis ipsum beatae? Doloribus tempore obcaecati assumenda ratione modi sit facere vitae delectus.</p>

    {{-- @livewire('counter') --}}
    <livewire:counter />
    {{-- <livewire:comments :initialComment="$comments"/> --}}
    <livewire:comments />
    
</body>
</html>