@extends('layouts.master')
@section('title')
    Izmeni privilegije korisnika
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Izmeni privilegije korisnika</h1>
            <!-----ISPIS GREŠKE KOD SLANJA FORME------->
            @include('errors.error')
            <!-----------ISPIS FORME ZA IZMENU PRAVA KORISNIKA-------->
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
            <!---------------ISPIS FORME ZA BRISANJE KORISNIKA-------------->
            {!! Form::open(['method'=>'DELETE', 'action' => ['AdminUserController@destroy',$user->id]]) !!}

            <div class="danger">
                <button class="btn btn-danger pull-right" type="submit">Obriši korisnika</button>
            </div>

              {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection