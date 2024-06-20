<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.include')
    @stack('css')
    <title>@yield('title') | Tugas</title>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center mt-5">
        <div class="row bg-primary rounded rounded-xl w-50">
            @yield('content')
        </div>
    </div>

    @stack('js')
    @include('layouts.script')
</body>
</html>