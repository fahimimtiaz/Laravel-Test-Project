@extends('layouts.master')

@section('master-content')

<br><br>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('indexOwn')}}">My Products</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('index')}}">All Products</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('create')}}">Create New Products</a>
        </div>
    </div>
    @if($message = Session::get('success'))
    <div class="alert alert-succes">
        <p>{{$message}}</p>
    </div>

    @endif


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <table class="table table-bordered">
                <tr>
                    <th>Product Id</th>

                    <th>Product Name</th>
                    <th>Product Details</th>
                    <th>Product Logo</th>
                    <th>Created By</th>
                    <th>Action</th>
                    <!-- <th>Created by</th> -->

                </tr>
                @foreach($product as $pro)
                <tr>


                    <td width="100px">{{$pro->id}}</th>
                    <td width="100px">{{$pro->product_name}}</th>
                    <td width="150px">{{$pro->product_details}}</th>
                    <td width="100px"> <img src=" {{URL:: to($pro->logo)}}" height="70px" width="80px"></td>
                    <td width="100px">{{$pro->userInfo->name}} </td>
                    <td width="100px">
                        <a class="btn btn-info" href="{{URL::to('show/product/'.$pro->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{URL::to('edit/product/'.$pro->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{URL::to('delete/product/'.$pro->id)}}" onclick="return confirm('are you sure ? ')">Delete</a>
                    </td>


                </tr>
                @endforeach

            </table>

        </div>
    </div>
    @endsection