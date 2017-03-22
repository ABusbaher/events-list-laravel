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
        //PRETRAGA DOGADJAJA PO DATUMU, MESTU I NASLOVU
        $events_s = Event::select('event_id','title','image','slug');
        $search = $request->get('search');
        if(!empty($search)) {
            $events_s->where('title', 'like', '%' . $search . '%')
                ->orWhereDate('date_and_time', 'LIKE', '%' . $search . '%')
                ->orWhere('place', 'LIKE', '%' . $search . '%');
            $events_s = $events_s->limit(6)->get();

        }
        //PRIKAZ 6 DOGADJAJA PO STRANI POČEV OD NABLIŽEG(DATUMA)
        $events = Event::select()->orderBy('date_and_time')->paginate(6);
        foreach($events as $event) {
                //PRIKAZ SAMO PRVIH 30 SLOVA OPISA DOGADJAJA
                $event->description = $this->shortenText($event->description,30);
        }
        return view('frontend.index',compact('events','events_s'));
    }

    public function getSingle($slug){
        //PRIKAZ JEDNOG DOGADJAJA
        $event = Event::findBySlug($slug);
        if(!$event){
            return redirect('events');
        }
        return view('frontend.single_event',compact('event'));
    }
    public function prijava(Request $request,$id)
    {
        //PRIJAVA ULOGOVANOG KORISNIKA NA DOGADJAJ
        $user = Auth::user();
        $this->validate($request, [
        'event_id' => 'unique:event-users,event_id,NULL,id,user_id,'.$user->id,
        'user_id' => 'required',
            //NE RADI CUSTOM ERROR NE ZNAM ZAŠTO
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
    //FUNKCIJA BROJI SLOVA U TEKSTU I PRIKAZUJE SKRAĆEN PRIKAZ TEKSTA
    private function shortenText($text,$words_count){
        if(str_word_count($text,0) > $words_count) {
          $words = str_word_count($text,2);
          $pos = array_keys($words);
          $text = substr($text,0,$pos[$words_count]) . '...';
        }
        return $text;
    }

}
