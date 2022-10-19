<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    //

    public function index(){
        $n=0;
        //$users = User::orderBy('created_at','desc');//->paginate(10);
        $users = User::all()->sortByDesc('created_at');
        return view('admin.users.index',['users'=>$users,'n'=>$n]);
    }

    public function show(User $user){
        return view('admin.users.profile',['user'=>$user]);
    }

    public function update(User $user){

        $inputs = request()->validate([
            'username'=>['required','string','max:255','alpha_dash'],
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255'],
            'avatar'=>['mimes:jpeg,png']
        ]);

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('post_images');
        }
        $user->update($inputs);

        return back();
    }

    public function destroy(User $user){

            $user->delete();
            Session::flash('user-deleted','User has been deleted');
            return back();

    }



}
