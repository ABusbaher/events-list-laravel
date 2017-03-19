@extends('layouts.master')
@section('title')
    Izmeni događaj
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Izmeni događaj</h1>

            @include('errors.error')

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
    </div>
@endsection
<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>