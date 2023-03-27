<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.users', ['users' => $users]);
    }


    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'))->with('message', 'User successfully deleted');
    }
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        $attr = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $attr['password'] = Hash::make($attr['password']);
        $success = $user->update($attr);
        if ($success)
        return redirect(route('users.show', $user))->with('message', 'User successfully edited');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store( Request $request)
    {
        $attr = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required'],
            'birthdate' =>  ['required'],
            'password' => ['required', 'min:8', 'confirmed' ]
        ]);
       $attr['password'] = Hash::make($attr['password']);
        $user = User::create($attr);
        return redirect(route('users.show', $user))->with('message', 'User successfully created');
    }
}
