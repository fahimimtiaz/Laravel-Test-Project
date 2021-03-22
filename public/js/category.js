
function check() {
    var rowCount = $("#catTable tr").length - 1;
    //alert(rowCount);

    for (var i = 1; i <= rowCount; i++) {

        console.log(i + ' : ' + $('#catTable tr:nth-child(' + (i + 1) + ') td:nth-child(2)').text());
    }

}
//Rearrange Index

function rearrangeIndexer() {
    var rowCount = $("#catTable tr").length - 1;
    //alert(rowCount);

    for (var i = 1; i <= rowCount; i++) {


        $('#catTable tr:nth-child(' + (i) + ') td:nth-child(1)').text(i);
        console.log(i + ' : ' + $('#catTable tr:nth-child(' + (i + 1) + ') td:nth-child(2)').text());
    }
}
//Rearrange Index ---


var eid;
$(document).on("click", "tr.editCat2 td.selecttd a#editbtn", function (e) {
    $tr = $(this).closest('tr');
    //alert($tr.find("td:nth-child(2)").text());
    //alert($tr.find("td:nth-child(2)").data("id"));
    //alert($tr.find("td:nth-child(2)").attr("data-id"));

    var old_name = $tr.find("td:nth-child(2)").text();

    eid = $tr.find("td:nth-child(2)").attr("data-id");

    console.log("Edit Requested :" + eid);

    $('#editCategoryModal').modal('show');
    $('#updateCat').val(old_name);

});

$('#editForm').on('submit', function (e) {
    e.preventDefault();
    $('#editCategoryModal').modal('hide');

    $.ajax({
        type: "POST",
        url: "/update/category/" + eid,
        data: $('#editForm').serialize(),

        success: function (response) {

            var category = response.name;
            $('#catEditId' + eid).text(category);
            console.log(eid);
            alert("Category Edited");

        },

        error: function (error) {
            console.log(error);
            alert("Category Not Updated");

        }

    });
});





function aaa() {
    alert($('#catTable tr:last td:nth-child(1)').text());
}
