@extends('layouts.master')
@section('title')
Lista dogadjaja
@endsection
@section('content')
<div class="row">
    <h1>Lista dogadjaja</h1>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="http://placehold.it/350x200" alt="...">
            <div class="caption">
                <h3>Thumbnail label</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae consectetur, ducimus eaque ipsam ipsum, itaque laudantium molestiae natus nesciunt non provident quae rem repellendus saepe sint tempore temporibus voluptas?</p>
                <div class="clearfix">
                    <div class="pull-left"><i>Datum i mesto</i></div>
                    <a href="#" class="btn btn-primary pull-right" role="button">Prijavi se</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection