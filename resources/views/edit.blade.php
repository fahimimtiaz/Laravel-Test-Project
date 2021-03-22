@extends('layouts.master')
@section('master-content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <br>
            <a class="btn btn-success" href="{{route('index')}}"> Back </a>
        </div>
    </div>
</div>

<form action="{{route('update.product',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="row">
        <strong>Select Category: </strong>
        <select class="custom-select" name="category_id" required>
            @foreach($category as $cat)
            <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product Details:</strong>
                <textarea class="form-control" name="product_details" placeholder="Details ">{{$product->product_details}}</textarea>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-8">
            <strong>Add New Tag : </strong>
            <select id="tags" style="width: 500px" name="tag_name[]" multiple="multiple">

                @foreach($product->tagInfo as $tg)
                <option selected="selected" value="{{$tg->tgInfo->tag_name}}">{{$tg->tgInfo->tag_name}}</option>
                <!-- <option value="{{$tg->tag_name}}">{{$tg->tag_name}}</option> -->
                @endforeach
            </select>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product Logo:</strong>
                <input type="file" name="logo">
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Old Logo:</strong>
                <img src=" {{URL:: to($product->logo)}}" height="70px" width="80px">
                <input type="hidden" name="old_logo" value="{{URL:: to($product->logo)}}">
            </div>
        </div>
    </div>




    <div class="col-xs-6 col-sm-6 col-md-6">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>




</form>
@endsection