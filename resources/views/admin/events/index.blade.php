@extends('layouts.master')
@section('title')
    Lista dogadjaja
@endsection
@section('content')
    <div class="row">
        <div class=".col-xs-12 .col-md-6 .col-md-offset-3">
            {!! Form::open(['method'=>'GET','route'=>'admin.events.index','class'=>'form-group','role'=>'search'])
          !!}

            <div class="input-group ">
                <input type="text" name="search" class="form-control" placeholder="Pretraži događaje...">
                <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>
            </div>
            {!! Form::close() !!}

            @if($events_s)
                        @foreach($events_s as $event)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img class="img-responsive" style="max-width: 350px" src="{{ URL::to('/') }}/images/{{$event->image}}"
                                         alt="...">
                                    <a class="a_search" href="{{route('admin.events.edit',$event->event_id)}}"
                                    >{{$event->title}}</a>

                                </div>
                            </div>
                        @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class=".col-xs-12 .col-md-6 .col-md-offset-3">
            <br /><br />
            @if(Session::has('deleted_event'))
                <div class="alert alert-danger">
                    <h4>{{session('deleted_event')}}</h4>
                </div>
            @endif

            @if(Session::has('updated_event'))
            <div class="alert alert-success">
                <h4>{{session('updated_event')}}</h4>
            </div>
            @endif

            @if(Session::has('added_event'))
                <div class="alert alert-success">
                    <h4>{{session('added_event')}}</h4>
                </div>
            @endif
            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <a class="btn btn-primary btn-lg active " href="{{route('admin.events.create')}}"
                       role="button">DODAJ
                        NOVI
                        DOGADJAJ</a>
                </div>
            </div>
            <br /><br /><hr /><br><br>
            @if($events)
                @foreach($events as $event)

                <h2>{{$event->title}}</h2>
    <div class="row">
       <div class="col-md-6 .col-md-offset-3">
        <img src="{{ URL::to('/') }}/images/{{$event->image}}" class="img-event" class="img-responsive" alt=""/>
       </div>
       <div class=" col-md-6 .col-md-offset-3">
        {!! $event->description !!}
        <p class="pull-right"><strong><i>{{$event->place}},{{ Carbon\Carbon::parse($event->date_and_time)->format('d-m-Y
        H:i') }}</i></strong></p>
       </div>

    </div>
        <div class="clearfix">
              <a class="btn btn-primary btn-lg active pull-left" href="{{route('admin.events.edit',$event->event_id)}}"
                 role="button">Izmeni</a>

          {!! Form::open(['method'=>'DELETE', 'action' => ['AdminEventsController@destroy',$event->event_id]]) !!}
            <button class="btn btn-danger pull-right" type="submit">Obriši</button>
          {!! Form::close() !!}
        </div>
            <hr>
            @endforeach
        @else
            <h2>Trenutno nema događaja</h2>
        @endif
    @endsection
        </div>
    </div>