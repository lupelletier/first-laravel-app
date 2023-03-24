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
    <form action="{{route('users.update', $user)}}" method="POST" novalidate>
        @csrf
        @method('put')
        <label for="name">Name</label>
        <input type="text" name="name" value="{{$user->name}}" @error('name') aria-invalid="true" @enderror>
        @error('name')
        <small aria-invalid="true">{{ $message }}</small>
        @enderror

        <br>

        <label for="email">Email</label>
        <input type="text" name="email" value="{{$user->email}}"  @error('email') aria-invalid="true" @enderror>
        @error('email')
        <small aria-invalid="true">{{ $message }}</small>
        @enderror

        <br>

        <label for="birthdate" >Birthdate </label>
        <input type="date" name="birthdate" value="{{$user->birthdate}}" @error('birthdate') aria-invalid="true" @enderror>
        @error('birthdate')
        <small aria-invalid="true">{{ $message }}</small>
        @enderror

        <br>

        <label for="password">Password</label>
        <input type="text" name="password" value="{{$user->password}}" @error('password') aria-invalid="true" @enderror>
        @error('password')
        <small aria-invalid="true">{{ $message }}</small>
        @enderror

        <br>

        <label for="password_confirmation">Confirm password</label>
        <input type="text" name="password_confirmation" value="{{$user->password_confirmation}}" @error('password') aria-invalid="true" @enderror>
        <button type="submit">Add</button>
        @error('password_confirmation')
        <small aria-invalid="true">{{ $message }}</small>
        @enderror
    </form>
<h1>{{$user->name}}</h1>
<li>{{$user->name}}</li>
<li>{{$user->email}}</li>
    <li>{{$user->id}}</li>
    <li>{{$user->birthdate}}</li>


{{--<li>{{$user->birthdate->format('D d/m/y')}}</li>--}}
    <br>
    <form action="{{route('users.index', $user)}}" method="GET">
        @csrf
        @method('get')
        <button type="submit">Go back</button>
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
</body>
</html>
