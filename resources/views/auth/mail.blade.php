<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Reset Your Password</h3>
    <a class="btn btn-danger" href="{{ route('auth.reset', $token) }}">Click here</a>
</body>

</html>
