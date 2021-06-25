<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function edit(User $user){
	    return view('user', compact('user'));
    }

    public function update(Request $request, User $user){
        $data = $request->only('name', 'email');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        
        $user->update($data);
        return redirect()->route('allPosts')->with('success', 'Usuario actualizado correctamente');

    }

    public function destroy(){
        $id = Auth::id();
        $user = User::where('_id', '=', $id)->delete();
        $posts = Post::where('user_id', '=', $id)->delete();
        return redirect()->route('allPosts');
    }
}
