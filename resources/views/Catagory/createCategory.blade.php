@extends('layouts.master')
@section('master-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Category</h2>
        </div>
        <div class="pull-right">
            <br>
            <a class="btn btn-success" href="{{route('indexCategory')}}"> Back </a>
        </div>


    </div>
</div>

<form action="{{route('storeCategory')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Category Name:</strong>
                <input type="text" name="name" class="form-control" id="ctnm" placeholder="Category Name" required>
            </div>
            <div class="alert-danger">{{$errors->first('name')}}</div>

        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>




</form>
@endsection