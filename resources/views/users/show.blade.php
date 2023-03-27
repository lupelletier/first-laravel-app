<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.11/dist/css/uikit.min.css" />
    <title>User profile</title>
</head>
<body>
<section class="uk-card uk-card-default uk-card-body uk-margin">
    <div >
        <h1>{{$user->name}}</h1>
        <li>{{$user->name}}</li>
        <li>{{$user->email}}</li>
        <li>{{$user->id}}</li>
        <li>{{$user->birthdate}}</li>
    </div>

    <br>

    <form action="{{route('users.index', $user)}}" method="GET">
        @csrf
        @method('get')
        <button class="uk-button uk-button-primary" type="submit">Go back</button>
    </form>

</section>

<br>

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
