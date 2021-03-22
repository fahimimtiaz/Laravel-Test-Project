@extends('layouts.master')

@section('master-content')


<br><br>

<div class="row">
    <div class="col-lg-3 margin-tb">

        <div class="pull-right">
            <a class="btn btn-success" href="{{route('create')}}">Create Product</a>
        </div>

    </div>
    {{--<div class="col-lg-3 margin-tb">
    
        <div class="pull-right">
            <a class="btn btn-info" href="{{route('createCategory')}}">Create Category</a>
</div>
</div> --}}

</div>

<br>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <select class="custom-select" name="" id="selectProduct">
                <option value="-1">Select Category</option>
                @foreach($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


@if($message = Session::get('success'))

<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong> {{$message}}
</div>

@endif

@if($message = Session::get('failed'))
<script>
    alert('{{$message}}');
</script>


<div class="product-options">
    <a id="myWish" href="javascript:;" class="btn btn-mini"> </a>
    <a href="" class="btn btn-mini"> </a>
</div>
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>

@endif

<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <!-- class="display" -->
        <!-- class="table table-bordered" -->
        <!-- class="display table table-hover table-bordered" -->

        <table class="display table-bordered" id="loadProduct">
            <thead>
                <th>#</th>

                <th>Product Name</th>
                <th>Product Details</th>
                <th>Created By</th>
                <th>Category</th>
                <th>#Tags </th>
                <th>Products Logo </th>
                <th><code>Action</code></th>
            </thead>
            <tbody>
                @foreach($product as $index=>$pro)
                <tr id="productRemove">
                    <td width="50px">{{++$index}}</td>
                    <td width="100px">{{$pro->product_name}}</td>
                    <td width="150px">{{$pro->product_details}}</td>

                    <td width="50px">{{$pro->userInfo['name']}} </td>
                    <td width="50px">{{$pro->catInfo['name']}} </td>

                    <td width="100px">

                        <?php
                        $tags = '';
                        foreach ($pro->tagInfo as $tg) {
                            $tags = $tags . ',' . $tg->tgInfo->tag_name;
                        }
                        $tags = trim($tags, ',');
                        echo $tags;



                        ?>

                    </td>

                    <td width="100px"> <img src=" {{URL:: to($pro->logo)}}" height="70px" width="80px"></td>

                    <td width="1000px">

                        <a class="btn btn-info" href="{{URL::to('show/product/'.$pro->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{URL::to('edit/product/'.$pro->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{URL::to('delete/product/'.$pro->id)}}" onclick="return confirm('are you sure ? ')">Delete</a>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary" onclick="loadCategory()"> Category(#Ajax) </button>

    </div>

</div>



@endsection