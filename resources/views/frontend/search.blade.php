@extends('layouts.master')
@section('title')
    Lista korisnika
@endsection
@section('content')
  <div class="row">
    <div class=".col-xs-12 .col-md-6 .col-md-offset-3">

        {!! Form::open(['method'=>'GET','route'=>'event.search','class'=>'form-group','role'=>'search'])
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
            @if(isset($events_s) && $events_s == "")
                <p>Nema rezultata pretrage</p>
            @else
            @foreach($events_s as $event)
            <div class="col-sm-6 col-md-4">
               <div class="thumbnail">
                 <img class="img-responsive" style="max-width: 350px" src="{{ URL::to('/') }}/images/{{$event->image}}"
                                 alt="...">
                  <a class="a_search"href="{{route('single_event',$event->event_id)}}" >{{$event->title}}</a>

                </div>
            </div>
            @endforeach
            @endif
         @endif

   </div>
</div>
@endsection

