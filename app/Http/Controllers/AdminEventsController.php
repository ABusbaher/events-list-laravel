<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //PRETRAGA DOGADJAJA PO DATUMU,NASLOVU ILI MESTU
        $events_s = Event::select('event_id','title','image','slug');
        $search = $request->get('search');
        if(!empty($search)) {
            $events_s
                ->whereDate('date_and_time', 'LIKE', '%' . $search . '%')
                ->orWhere('title', 'LIKE', '%' . $search . '%')
                ->orWhere('place', 'LIKE', '%' . $search . '%');

            $events_s = $events_s->limit(6)->get();

        }

        //ISPIS SVIH DOGADJAJA POČEV OD ONOG SA NAJVIŠE PRIJAVLJENIH KORISNIKA
        $events =Event::withCount('users')->orderBy('users_count', 'desc')->paginate(6);
        return view('admin.events.index',compact('events','events_s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //DODAVANJE NOVOG DOGADJAJA I SLIKE
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF',
            'date_and_time' => 'required|date',
            'place' => 'required',
        ]);
        $input = $request->all();
        $image = $request->file('image');
        if($image){
            $name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images',$name);
            $input['image'] = $name;
        }
        Event::create($input);
        Session::flash('added_event','Događaj je uspešno dodat!');
        return redirect('/admin/events');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //PRIKAZ DOGADJAJA ZAJEDNO SA SPISKOM PRIJAVLJENIH UČESNIKA I NJIHOVIM BROJEM
        $event = Event::findOrFail($id);
        $user_count = EventUser::where('event_id',$id)->count();
        $event_users = EventUser::where('event_id',$id)->get();

        return view('admin.events.edit',compact('event','user_count','event_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //IZMENA DOGADJAJA
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF',
            'date_and_time' => 'required|date',
            'place' => 'required',
            ['image.required' => 'Niste izabrali sliku',
                'image.image' => 'Izabrani fajl nije slika',]
        ]);

        $event = Event::findOrFail($id);
        $input = $request->all();
        $image = $request->file('image');
        if($image){
            $name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images',$name);
            $input['image'] = $name;
        }
        $event->update($input);
        Session::flash('updated_event','Događaj je uspešno ažuriran');
        return redirect('/admin/events');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //BRISANJE DOGADJAJA (I SLIKE IZ FOLDERA)
        $event = Event::findOrFail($id);
        unlink('images/'. $event->image);
        $event->delete();
        Session::flash('deleted_event','Dogadjaj i slika su obrisani');
        return redirect('/admin/events');
    }


}
