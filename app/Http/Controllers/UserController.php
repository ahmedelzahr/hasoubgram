<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function show(User $user){
            $canSeeUserData=$this->canSeeUserData($user);
            $showFollowingButton=$this->showFollowingButton($user);
            return view('user.profile', compact('user', 'canSeeUserData','showFollowingButton'));
    }

    private function canSeeUserData(User $user) :bool{
        $isGuest = !isSet(auth()->user);
        if ($isGuest){
            return !$user->private_account;
        }else{
            return auth()->id()===$user->id || !auth()->user->private_account || auth()->user->following()->contain($user->id);
        }
    }

    private function showFollowingButton(User $user) :bool{
        $isGuest = !isSet(auth()->user);
          if ($isGuest){
            return true;
        }else{
            return auth()->id()!=$user->id && !auth()->user->following()->contain($user->id);
        }
    }
}
