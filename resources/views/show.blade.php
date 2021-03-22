@extends('layouts.master')

@section('master-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Product</h2>
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
            <strong>Product Id: </strong>
            {{$data -> id}}

        </div>

    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-froup">
            <strong>Product Name: </strong>
            {{$data -> product_name}}

        </div>

    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-froup">
            <strong>Product Details: </strong>
            {{$data -> product_details}}

        </div>

    </div>
</div>


<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-froup">
            <strong>Creator Id: </strong>
            {{$data -> userInfo -> id}}

        </div>

    </div>
</div>



<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-froup">
            <strong>Creator Name: </strong>
            {{$data->userInfo->name}}


        </div>

    </div>
</div>


<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-froup">
            <strong>Email : </strong>
            {{$data -> userInfo -> email}}


        </div>

    </div>
</div>




<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-froup">
            <strong>Product Logo: </strong>
            <img src="{{URL::to($data->logo)}}" height="150px" width="" alt="200px">

        </div>

    </div>
</div>

@endsection