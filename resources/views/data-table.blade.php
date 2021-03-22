<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
    html,
    body {
        height: 100%;
        position: relative;
    }

    .footer-div {
        position: fixed;
        /**change my value to static and see what happens**/
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: green;
    }
</style>

<body>
    <div id="app">

        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript">
            $(function() {

                var table = $('#catTable').DataTable({
                    processing: true,
                    serverSide: true,
                    //ajax: "{{ route('indexCategory') }}",
                    // ajax: "/category-datatable",
                    lengthMenu: [
                        [5, 50, 200, 300, -1],
                        [5, 50, 200, 300, "All"]
                    ],
                    ajax: {
                        url: "/category-datatable",
                        dataSrc: ""
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });
            });
        </script>

        <style>
            .inline-flex {
                display: inline-flex;
            }
        </style>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Data Table Page') }}</div>

                        <div class="card-body">

                            {{ __('Data Table Demo will be shown here') }}

                            <div class="container mt-5 table-responsive">
                                <h2 class="mb-4">Laravel 8 Yajra Datatable | Search by All | Column ColSpan</h2>
                                <table class="table table-bordered data-table" id="catTable">
                                    <thead>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>