<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>

    <x-nav />
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('ErrorMessage'))
        <div class="alert alert-danger">
            {{ session('ErrorMessage') }}
        </div>
    @endif
    <div class="class min-vh-100">
        {{ $slot }}
    </div>

    <x-footer />
</body>

</html>
