@extends('layouts.master')
@section('title')
    Lista korisnika
@endsection
@section('content')
    <div class="row">
        <div class=".col-xs-12 .col-md-6 .col-md-offset-3">

          <br /><br />
            <!-----ISPIS PORUKA KROZ SESIJE PROSLEDJENIH PREKO FORMI------->
           @if(Session::has('deleted_user'))
              <div class="alert alert-danger">
                    <h4>{{session('deleted_user')}}</h4>
              </div>
            @endif

            @if(Session::has('updated_user'))
                <div class="alert alert-success">
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
                            <!---------------ISPIS KORISNIKA------->
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
            <!-----PRIKAZ PAGINACIJE------->
            <div class="class pull-right">
                {!!$users->render()!!}
            </div>

        </div>
    </div>
@endsection