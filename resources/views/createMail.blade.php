@extends('layouts.master')
@section('master-content')
<div class="container">
    <h2>Email form</h2>
    <form action="{{route('sendemail')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($message = Session::get('success'))

        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Success! </strong> {{$message}}
        </div>

        @endif


        <div class="form-group">
            <label class="control-label col-sm-2" for="email">To:</label>
            <div class="col-sm-10">
                <input type="text" name="to" class="form-control" placeholder="To : ">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">CC :</label>
            <div class="col-sm-10">
                <input type="text" name="cc" class="form-control" placeholder="CC : ">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Subject:</label>
            <div class="col-sm-10">
                <input type="text" name="email_subject" class="form-control" placeholder="Email Subject">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Body:</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="email_body" rows="5" placeholder="Email Body"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Upload file :</label>
            <div class="col-sm-10">
                <input type="file" id="email_file" name="email_file" multiple><br><br>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-primary">Send</button>
            </div>
        </div>
    </form>
</div>


@endsection