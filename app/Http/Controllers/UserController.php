<?php

namespace App\Http\Controllers;

use App\EventUser;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function getUser($id)
    {
        //PRIKAZ PODATAKA KORISNIKA ZAJEDNO SA DOGADJAJIMA NA KOJE SE PRIJAVIO(I UKUPAN BROJ)
        $user = User::findOrFail($id);
        $event_count = EventUser::where('user_id',$id)->count();
        $event_users = EventUser::where('user_id',$id)->get();
        return view('frontend.single_user',compact('user','event_count','event_users'));
    }
}
