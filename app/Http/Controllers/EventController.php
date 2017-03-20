<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventUser;
use App\Http\Requests\EventUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function getAll(Request $request){
        $events_s = Event::select('event_id','title','image');
        $search = $request->get('search');
        if(!empty($search)) {
            $events_s->where('title', 'like', '%' . $search . '%')
                ->orWhere('date_and_time', 'LIKE', '%' . $search . '%')
                ->orWhere('place', 'LIKE', '%' . $search . '%');
            $events_s = $events_s->paginate(6);

        }

        $events = Event::all();
        return view('frontend.index',compact('events','events_s'));
    }

    public function getSingle($event_id){
        $event = Event::findOrFail($event_id);
        if(!$event){
            return redirect('events');
        }
        return view('frontend.single_event',compact('event'));
    }
    public function prijava(Request $request,$id)
    {

        $user = Auth::user();
        $this->validate($request, [
        'event_id' => 'unique:event-users,event_id,NULL,id,user_id,'.$user->id,
        'user_id' => 'required',
        ['user_id.required' => 'Morate biti ulogovani da bi ste se prijavili za dogadjaj',
            'event_id.unique:event-users,event_id,NULL,id,user_id,' => 'Već ste se prijavili na događaj',]
    ]);
        $prijava = new EventUser();
        $prijava ->event_id = $request->event_id;
        $prijava ->user_id = $request->user_id;
        $prijava ->save();
        Session::flash('check_in','Uspešno ste se prijavili');
        return redirect('events');
    }


}
