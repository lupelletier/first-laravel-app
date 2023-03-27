<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.11/dist/css/uikit.min.css" />
    <title>Users</title>
</head>
<body>


{{ session('message') }}

<header class="uk-navbar-right">
    <ul class="uk-navbar-nav">

    @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class=" font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                <a href="{{route('logout')}}">Log Out</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                <a href="{{ route('users.index') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Users</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
    @endif
    </ul>
</header>
<main>
    <div class="uk-card uk-card-body">

    <h1>Users:</h1>

    <ul class="uk-grid-column-small uk-grid-row-medium uk-child-width-1-3@s uk-text-center uk-flex uk-flex-wrap uk-margin" uk-grid>
        @foreach($users as $user)
            <div>
            <li class="uk-card uk-card-default uk-card-body uk-margin ">

                {{--            {{$user->name}})--}}
                <a href="{{route('users.show', $user)}}"> {{$user->name}} </a>
                <div class="uk-flex uk-flex-center">
                    <div class=" uk-margin-left">
                        <form action="{{route('users.destroy', $user)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="uk-button uk-button-default" type="submit">Delete</button>
                        </form>
                    </div>
                    <div>
                        <form action="{{route('users.edit', $user)}}" method="GET">
                            @csrf
                            @method('get')
                            <button type="submit" class="uk-button uk-button-primary">Edit User</button>
                        </form>
                    </div>
                </div>
                <br>

                {{--            <a href="{{route('users.edit-user', $user)}}" >Edit User</a>--}}
            </li>
            </div>
        @endforeach
    </ul>
    </div>

    <form action="{{route('users.create')}}" method="GET">
        @csrf
        @method('get')
        <button class="uk-button" type="submit">Add User</button>
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

