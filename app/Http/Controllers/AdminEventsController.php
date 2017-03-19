<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index',compact('events'));
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
        $event = Event::findOrFail($id);
        return view('admin.events.edit',compact('event'));
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF',
            'date_and_time' => 'required|date',
            'place' => 'required',
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
        $event = Event::findOrFail($id);
        unlink('images/'. $event->image);
        $event->delete();
        Session::flash('deleted_event','Dogadjaj i slika su obrisani');
        return redirect('/admin/events');
    }
}
