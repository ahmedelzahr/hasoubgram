<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowController extends Controller
{
    public function follow(User $user)
    {

        if (auth()->user()->id === $user->id) {
            
            return back()->with('error', 'You cant follow your self');
        } else {
  
            auth()->user()->follow($user);
         
            return back()->with('status', 'Following request sent');
        }
    }
     public function unfollow(User $user)
    {
        if (auth()->user() === $user) {
            return back()->with('error', 'You cant unfollow your self');
        } else {
            auth()->user()->unfollow($user);

            return back()->with('status', 'Unfollowing Successfuly');
        }
    }
}
