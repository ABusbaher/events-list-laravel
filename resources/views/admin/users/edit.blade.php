@extends('layouts.master')
@section('title')
    Izmeni privilegije korisnika
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Izmeni privilegije korisnika</h1>

            @include('errors.error')

            {!! Form::model($user,['method'=> 'PATCH','action' => ['AdminUserController@update',$user->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active',array(1=>'Active',0=>'Not active'), null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Pozicija:') !!}
                {!! Form::select('role_id',$roles, 2, ['class' => 'form-control']) !!}
            </div>
            <div class="clearfix">
            <button class="btn btn-success pull-left" type="submit">Izmeni korisnika</button>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action' => ['AdminUserController@destroy',$user->id]]) !!}


                <button class="btn btn-danger pull-right" type="submit">Obriši korisnika</button>

              {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection