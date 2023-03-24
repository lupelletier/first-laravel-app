<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <link rel="stylesheet" href="css/pico.classless.min.css">
    <title>Users</title>
</head>
<body>
<h1>Users:</h1>

{{ session('message') }}

<main>
    <ul class="grid">
        <article>
        @foreach($users as $user)

            <li class="">

                {{--            {{$user->name}})--}}
                <a href="{{route('users.show', $user)}}"> {{$user->name}} </a>

                <form action="{{route('users.destroy', $user)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>

                <form action="{{route('users.edit', $user)}}" method="GET">
                    @csrf
                    @method('get')
                    <button type="submit">Edit User</button>
                </form>
                <br>

                {{--            <a href="{{route('users.edit-user', $user)}}" >Edit User</a>--}}
            </li>
        @endforeach
        </article>
    </ul>

    <form action="{{route('users.create')}}" method="GET">
        @csrf
        @method('get')
        <button type="submit">Add User</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif


</main>
</body>
</html>
