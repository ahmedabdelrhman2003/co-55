<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>welcome home
        <p>{{ $user->name }}</p>
        {{-- <p>{{ $user->email }}</p> --}}
        <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger">logout</a>

    </h1>


</body>

</html>