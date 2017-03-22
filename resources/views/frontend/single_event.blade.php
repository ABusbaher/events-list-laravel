@extends('layouts.master')
@section('title')
    Lista korisnika
@endsection
@section('content')
    <div class="row">
        <div class=".col-xs-12 .col-md-6 .col-md-offset-3">

        <h1>{{$event->title}}</h1>
        <!-----PRIKAZ GREŠKE KOD SLANJA FORME------->
        @include('errors.error')

        <div class="col-md-6 col-md-offset-2">
            <img class="img-responsive" style="max-width: 800px" src="{{ URL::to('/') }}/images/{{$event->image}}" alt=""/>
        </div><div class="col-md-8 col-md-offset-2">
            <p class="single_page_p">{!! $event->description !!}</p>
            <p class="pull-left"><strong><i>{{$event->place}},{{ Carbon\Carbon::parse($event->date_and_time)->format
          ('d-m-Y H:i') }}</i></strong></p>
          @if(Auth::check())
              <!-----PRIKAZ FORME ZA PRIJAVU NA DOGADJAJ(MOŽE SAMO AKTIVAN SUBCRIBER)------->
             @if(Auth::user()->is_active == 1 && Auth::user()->role_id == 2)
                {!! Form::open(['method'=>'POST', 'action' => ['EventController@prijava',$event->event_id]]) !!}
                {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                {!! Form::hidden('event_id', $event->event_id, ['class' => 'form-control']) !!}
                <button class="btn btn-primary pull-right" type="submit">Prijavi se</button>
                {!! Form::close() !!}
             @endif
          @endif
        </div>

      </div>
    </div>
@endsection