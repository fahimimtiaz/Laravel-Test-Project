@extends('layouts.master')

@section('master-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>My Profile</h2>
        </div>
        <div class="pull-right">
            <br>
            <a class="btn btn-success" href="{{route('index')}}"> Back </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-froup">
            <strong>User Id: </strong>
            {{$data -> id}}

        </div>

    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-froup">
            <strong>User Name: </strong>
            {{$data -> name}}

        </div>

    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-froup">
            <strong>Email : </strong>
            {{$data -> email}}

        </div>

    </div>
</div>

@endsection