<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index($user){
        $user = User::findOrFail($user);
        return view('profiles.index', ['user' => $user]);
    }

    public function edit($user){
        $this->authorize('update', $user->profile);
        $user = User::findOrFail($user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $data = request()->validate([
            'title'=> 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => [''],
        ]);

        auth()->user->profile->update($data);
        return redirect("/profile/{$user->id}");
    }

}
