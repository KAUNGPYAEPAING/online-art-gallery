<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();

        return view('seller.users.index', ['users'=>$users]);
    }



    public function show(User $user){
        $roles = Role::all();

        return view('seller.profile', ['user'=>$user, 'roles'=>$roles]);
    }

    public function update(User $user){
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'avata' =>['file'],
        ]);

        if(request('avata')){
            $inputs['avata'] = request('avata')->store('images');
        }

        $user->update($inputs);

        return back();
    }

    public function destroy(User $user){
        $user->delete();

        session()->flash('user-delete', $user->name . ' has been deleted');

        return back();
    }

    public function attach(User $user){
        $user->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user){
        $user->roles()->detach(request('role'));

        return back();
    }
}
