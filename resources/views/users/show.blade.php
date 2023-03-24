<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <title>User profile</title>
</head>
<body>
<article>
    <h1>{{$user->name}}</h1>

    <li>{{$user->name}}</li>
    <li>{{$user->email}}</li>
    <li>{{$user->id}}</li>
    <li>{{$user->birthdate}}</li>
    <li>{{$user->password}}</li>

</article>

<br>
<form action="{{route('users.index', $user)}}" method="GET">
    @csrf
    @method('get')
    <button type="submit">Go back</button>
</form>
<h2>{{ session('message') }}
</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
