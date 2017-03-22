@extends('layouts.master')
@section('title')
    User
@endsection
@section('content')
    <div class="row">
        <div class="panel panel-default col-md-10 col-md-offset-1">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                    <!-----PRIKAZ PODATAKA O KORISNIKU------->
                       <h1>{{$user->name}}</h1>
                    </div>
                    <div class="col-md-4">
                        <img src="https://placehold.it/400x350" class="pull-right img-responsive" alt="user photo">
                    </div>
                </div>
                <font size="4" id="rating_d">Email: </font>
                <font size="4" id="rating_d"> {{$user->email}}</font>
                <br><br>
                <font size="4">Pozicija:</font>
                <font size="4" id="details">{{$user->role->name}}</font>
                <br><br>
                <font size="4">Status:</font>
                <font size="4" id="details">{{$user->is_active == 1 ? 'Active' : 'Not active'}}</font>
                <ul><font size="4">Događaji na koje ste se prijavili({{$event_count}}):
                        <!-----SPISAK DOGADJAJA NA KOJIMA SE KORISNIK PRIJAVIO------->
                        @if($event_users)
                            @foreach($event_users as $e_user)
                                <li><font size="4">{!! $e_user->events->title !!}</font></li>
                            @endforeach
                        @endif
                </font></ul>
            </div>
        </div>
    </div>
@endsection
