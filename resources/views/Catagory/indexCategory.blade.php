@extends('layouts.master')

@section('master-content')

<br><br>

<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form id="addForm">
                    {{csrf_field()}}
                    {{ method_field('POST') }}
                    <div class="mb-3">
                        <label for="createCat" class="form-label">Category Name : </label>
                        <input type="text" name="name" class="form-control" id="createCat" placeholder="Category Name" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>

                    </div>
                </form>

                <!-- /Form -->
            </div>

        </div>
    </div>
</div>

<!-- End of Bootstrap Modal  -->

<!-- Edit -->

<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form id="editForm">
                    {{csrf_field()}}
                    {{ method_field('POST') }}
                    <div class="mb-3">
                        <label for="createCat" class="form-label">Category Name : </label>
                        <input type="text" name="name" class="form-control" id="updateCat" placeholder="Category Name" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>

                    </div>
                </form>

                <!-- /Form -->
            </div>

        </div>
    </div>
</div>

<!-- End of Bootstrap Modal  -->

{{-- This is a blade Comment_out --}}



<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Category List</h2>
        </div>


        <br>

    </div>
    @if($message = Session::get('success'))
    <div class="alert alert-succes">
        <p>{{$message}}</p>
    </div>

    @endif


    <table class="table table-bordered data-table" id="catTable">
        <thead>
            <th>Id</th>

            <th>Category Name</th>

        </thead>


        {{--

        <thead>
            <tr>
                <th>#</th>

                <th>Category Name</th>

                <th>Action </th>
            </tr>
        </thead>
                 
        <tbody>

            <?php $cnt = 0;   ?>
            @foreach($category as $index=>$cat)
            <tr id="catRow{{$cat->id}}" class="editCat2">


        <td width="100px" id="indexId" width="100px">{{++$index}}</td>

        <td width="300px" id="catEditId{{$cat->id}}" width="100px" data-id='{{$cat->id}}'>{{$cat->name}} </td>

        <td width="300px" class="selecttd">
            <a class="btn btn-primary" id="editbtn">Edit</a>

            <a class="btn btn-danger" onclick='deleteCat("{{$cat->id}}")'>Delete</a>
        </td>

        <?php $cnt++; ?>

        </tr>
        @endforeach

        </tbody> --}}

    </table>

    <br>


    <!-- Button trigger modal -->
    <div class="col-lg-12 margin-tb">

        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
            Create Category
        </button>


    </div>

    <br>
    <!-- <span onClick="aaa()">Click</span> -->

</div>


@endsection