@extends('layouts.master')
@section('title')
    Events list
@endsection
@section('content')
    <div class="row">
        <h1>Lista dogadjaja</h1>
        @if($events)
            @foreach($events->chunk(3) as $chunk)
                @foreach($chunk as $event)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="img-responsive" style="max-width: 350px" src="{{ URL::to('/') }}/images/{{$event->image}}"
                                 alt="...">
                            <div class="caption">
                                <h3>{{$event->title}}</h3>
                                <p>{!! $event->description !!}</p>
                                <div class="clearfix">
                                    <div class="pull-left"><p><i>{{$event->date_and_time}},{{$event->place}}</i></p></div>
                                    <p><a href="#" class="btn btn-primary pull-right" role="button">Prijavi se</a>
                                    </p></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        @endif
    </div>
@endsection