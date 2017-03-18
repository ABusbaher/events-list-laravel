@extends('layouts.master')
@section('title')
    Lista korisnika
@endsection
@section('content')
    <div class="row">
        <div class=".col-xs-12 .col-md-6 .col-md-offset-3">

          <br /><br />
           @if(Session::has('deleted_user'))
              <div class="alert alert-danger">
                    <p>{{session('deleted_user')}}</p>
              </div>
            @endif

            @if(Session::has('updated_user'))
                <div class="bg-success">
                     <h4>{{session('updated_user')}}</h4>
                </div>
             @endif


               <h1>Lista korisnika</h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Ime i prezime</th>
                    <th>Pozicija</th>
                    <th>Email</th>
                    <th>Datum prijema</th>
                    <th>Status</th>
                    <th>Izmeni</th>
                </tr>
                </thead>
                @if($users)
                    @foreach($users as $user)
                        <tbody>
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role_id ? $user->role->name : 'Dodelite privilegiju'}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->is_active == 1 ? 'Active' : 'Not active'}}</td>
                            <td><a href="{{route('admin.users.edit',$user->id)}}"><button class="btn btn-success">Izmeni
                                        korisnika</button></a></td>
                        </tr>

                        </tbody>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection