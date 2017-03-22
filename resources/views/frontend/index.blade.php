@extends('layouts.master')
@section('title')
    Events list
@endsection
@section('content')
    <div class="row">
        <h1>Lista festivala</h1>
        <!--------------PRIKAZ FORME ZA PRETRAGU DOGADJAJA------->
        {!! Form::open(['method'=>'GET','route'=>'events','class'=>'form-group','role'=>'search'])
         !!}

        <div class="input-group ">
            <input type="text" name="search" class="form-control" placeholder="Pretraži festivale...">
            <span class="input-group-btn">
          <button type="submit" class="btn btn-default-sm">
            <i class="fa fa-search"></i>
          </button>
        </span>
        </div>
        {!! Form::close() !!}
        @if($events_s)
            @foreach($events_s as $event)
            <!-------PRIKAZ DOGADJAJA------->
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img class="img-responsive" style="max-width: 350px" src="{{ URL::to('/') }}/images/{{$event->image}}"
                             alt="...">
                        <a class="a_search"href="{{route('single_event',$event->slug)}}" >{{$event->title}}</a>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
   <!-----PRIKAZ PORUKE O USPEŠNOJ PRIJAVI NA DOGADJAJ------->
    @if(Session::has('check_in'))
            <div class="alert alert-success">
                <h4>{{session('check_in')}}</h4>
            </div>
        @endif

        @if($events)
            @foreach($events->chunk(3) as $chunk)
                @foreach($chunk as $event)
                <!--------ISPIS DOGADJAJA------->
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="img-responsive" style="max-width: 350px" src="{{ URL::to('/') }}/images/{{$event->image}}"
                                 alt="...">
                            <div class="caption">
                                <h3>{{$event->title}}</h3>
                                <p>{!! $event->description !!}</p>
                                <div class="clearfix">
                                    <div class="pull-left"><p><strong><i>{{ Carbon\Carbon::parse($event->date_and_time)->format('d-m-Y
        H:i') }},{{$event->place}}</i></strong></p></div>
                                    <a href="{{route('single_event',$event->slug)}}" class="btn btn-primary
                                    pull-right" role="button">Čitaj više</a>
                                    </div>
                            </div>
                        </div>
                    </div>
               @endforeach
            @endforeach
                <div class="row">
                    <!-----PRIKAZ PAGINACIJE------->
                    <div class=".col-xs-12 .col-md-6 .col-md-offset-5 pull-right">
                        {!!$events->render()!!}
                    </div>
                </div>
        @endif
    </div>
@endsection