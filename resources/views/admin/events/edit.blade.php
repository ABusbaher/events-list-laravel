@extends('layouts.master')
@section('title')
    Izmeni događaj
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-----UKUPAN BROJ PRIJAVLJENIH UČESNIKA NA TAJ DOGADJAJ------->
            <ul><h2>Prijavljeni učesnici({{$user_count}}):
           <!-----IMENA SVIH PRIJAVLJENIH UČESNIKA NA TAJ DOGADJAJ------->
            @if($event_users)
                @foreach($event_users as $e_user)
                    <li><h4>{!! $e_user->users->name !!}</h4></li>
                @endforeach
            @endif

            </h2></ul>
            <img src="{{ URL::to('/') }}/images/{{$event->image}}" class="img-event" class="img-responsive" alt=""/>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <h2>Izmeni događaj</h2>
            <!-----ISPIS GREŠKE KOD SLANJA FORME------->
            @include('errors.error')
        <!-----------------------------FORMA ZA IZMENU DOGADJAJA--------------------------->
            {!! Form::model($event,['method'=> 'PATCH','action' => ['AdminEventsController@update',
            $event->event_id],'files' =>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Naslov:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Opis:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::file('image',null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('date_and_time', 'Datum i vreme početka(format Y-M-D H:M:S)') !!}
                {!! Form::text('date_and_time', null, ['class' => 'form-control'])
                 !!}
            </div>

            <div class="form-group">
                {!! Form::label('place', 'Mesto:') !!}
                {!! Form::text('place', null, ['class' => 'form-control']) !!}
            </div>
            <button class="btn btn-success pull-left" type="submit">Izmeni događaj</button>

            {!! Form::close() !!}
            </div>
        </div>
@endsection
@section('scripts')
<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection