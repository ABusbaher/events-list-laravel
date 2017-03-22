@extends('layouts.master')
@section('title')
    Dodaj novi dogadjaj
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Dodaj novi dogadjaj</h1>

            @include('errors.error')
                <!-----------------------------FORMA ZA DODAVANJE NOVOG DOGADJAJA--------------------------->
        {!! Form::open(['method'=> 'POST','action' => 'AdminEventsController@store','files' => true]) !!}

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
                <button class="btn btn-success pull-left" type="submit">Dodaj događaj</button>

        {!! Form::close() !!}


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection