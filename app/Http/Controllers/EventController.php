<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests;

class EventController extends Controller
{
    public function getAll(){
        $events = Event::all();
        return view('frontend.index',compact('events'));
    }
}
