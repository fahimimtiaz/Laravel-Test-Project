@extends('layouts.master')
@section('master-content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <br>
                <a class="btn btn-success" href="{{route('index')}}"> Back </a>
            </div>
        </div>
    </div>

</div>

<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Select Category: </strong>
                    <select class="custom-select" name="category_id" required>
                        <!-- <option selected></option> -->
                        <option value=""> Select Category </option>
                        @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="alert-danger">{{$errors->first('name')}}</div>
            </div>

        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" required>
                </div>
                <div class="alert-danger">{{$errors->first('product_name')}}</div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Details:</strong>
                    <textarea class="form-control" name="product_details" placeholder="Details " required></textarea>
                </div>
                <div class="alert-danger">{{$errors->first('product_details')}}</div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-8">

                <strong>Add Some Tag : </strong>
                <select id="tags" style="width: 500px; color:black;" name="tag_name[]" multiple="multiple">

                    @foreach($tag as $tg)
                    <option value="{{$tg->tag_name}}">{{$tg->tag_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Logo:</strong>
                    <input type="file" name="logo" required>
                </div>
                <div class="alert-danger">{{$errors->first('logo')}}</div>
            </div>
        </div>


        <div class="col-xs-6 col-sm-6 col-md-6">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>




</form>
@endsection