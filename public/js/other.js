$("#tags").select2({
    placeholder: "Add tag ",
    tags: true,
    tokenSeparators: [',', ' '],
    allowClear: true,

});

$(document).ready(function () {
    $('.select_product').select2();
});

$("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
    $("#success-alert").slideUp(500);
});

// $(document).ready(function () {
//     $('#loadProduct').DataTable({
//         "pagingType": "full_numbers"
//     });
// });

// $(document).ready(function () {
//     $('#catTable').DataTable()
// });

// $(document).ready(function () {

//     console.log('Working');
//     $('#catTable').DataTable({
//         processing: true,
//         serverSide: true,
//         //ajax: "{{ route('indexCategory') }}",
//         //ajax: "/category-datatable",

//         ajax: {
//             url: "/category-datatable",
//             dataSrc: ""
//         },
//         lengthMenu: [
//             [5, 50, 200, 300, -1],
//             [5, 50, 200, 300, "All"]
//         ],
//         columns: [
//             {
//                 data: 'id',
//                 name: 'id'
//             },
//             {
//                 data: 'name',
//                 name: 'name',
//                 orderable: true,
//                 searchable: true
//             }

//         ]
//     });
// });

