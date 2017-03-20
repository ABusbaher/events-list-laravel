<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function get(Request $request){
        $events_s = Event::select('event_id','title','image');
        $search = $request->get('search');
        if(!empty($search)) {
            $events_s->where('title', 'like', '%' . $search . '%')
                ->orWhere('date_and_time', 'LIKE', '%' . $search . '%')
                ->orWhere('place', 'LIKE', '%' . $search . '%');
                $events_s = $events_s->paginate(6);

        }
        return view('frontend.search',compact('events_s'));

    }

    public function search(Request $request){

          return $request->get('search');
          //$events = Event::select()
              //->where('date_and_time', 'LIKE', '%' . $s . '%')
              //->where('title','LIKE','%'.$request->search.'%')
              //->orWhere('place','LIKE','%'.$request->search.'%')->get();

    }
}
