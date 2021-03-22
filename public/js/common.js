

function deleteCat(id) {
    if (confirm("Are you sure?")) {
        console.log(id);


        $.ajax({
            type: 'GET',
            url: "/delete/category/" + id,
            success: function () {

                var temp = '#catRow' + id;

                $(temp).fadeOut();
                $(temp).remove();
                $(temp).hide();

                rearrangeIndexer();
            },
            error: function (error) {
                console.log(error);
                alert("Category Not Deleted");

            }
        });
    }
    return false;

}

$(document).ready(function () {




    //Add something after index

    $(':button[type="submit"]').prop('disabled', true);
    $('#ctnm input[type="text"]').keyup(function () {
        if ($(this).val() != '') {
            $(':button[type="submit"]').prop('disabled', false);
        }
        else {
            $(':button[type="submit"]').prop('disabled', true);
        }
        if (this.value.length > 10) {
            $(':button[type="submit"]').prop('disabled', true);
            alert("Character can't be greater than 10 character.");
        }
    });



    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        $('#addCategoryModal').modal('hide');

        $.ajax({
            type: "POST",
            url: "/category/create",
            data: $('#addForm').serialize(),

            success: function (response) {


                $("#createCat").val("");
                var a = $('#catTable tr:last td:nth-child(1)').text();
                a = parseInt(a);
                a += 1;


                var ndx = $("<td id='indexId' width = '100px' > < /td>").text(a);

                var id = response.id;
                var category = $("<td width id='catEditId" + id + "'= '100px' data-id='" + id + "'> < /td>").text(response.name);

                var edit = $(" <a class ='btn btn-primary' id='editbtn'>  </a>").text("Edit");

                var table_row;

                row_id = 'catRow' + id;

                var del = $(" <a class ='btn btn-danger'  onclick=deleteCat(" + '"' + id + '"' + ")> </a>").text("Delete");


                var del_td = $("<td width='100px' class='selecttd'> </td>").append(edit, del);

                table_row = $("<tr id='" + row_id + "' class='editCat2''> < /tr>").append(ndx, category, del_td);


                $('#catTable').append(table_row);

                check();

                // var table = $('#catTable').DataTable();
                // table.ajax.reload()



            },

            error: function (error) {
                var msg = JSON.parse(error.responseText);
                alert(msg.errors.name);

            }

        });

    });
});


