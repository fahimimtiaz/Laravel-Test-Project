$('#selectProduct').on('change', function () {


    var id = this.value;
    console.log("Data Cleared !! ");

    if (id == -1) {
        $.ajax({
            type: "GET",
            url: "/products/",
            success: function (response) {
                loadProducts(response);
            },
            error: function (error) {
            }
        });


    }
    else {
        $.ajax({
            type: "GET",
            url: "/products/" + id,
            success: function (response) {
                loadProducts(response);
            },
            error: function (error) {
            }

        });

    }





});

function loadProducts(response) {

    $('#productRemove ').remove();
    console.log(response);
    var len = response.length;

    for (var i = 0; i < len; i++) {
        var id = response[i].id;
        var name = response[i].product_name;
        var details = response[i].product_details;
        var user_name = response[i].user_info.name;
        var cat_name = response[i].cat_info.name;
        var logo = response[i].logo;



        var td1 = $(" <td width='50px'></td>").text(i + 1);
        var td2 = $(" <td width='50px'></td>").text(name);
        var td3 = $(" <td width='50px'></td>").text(details);
        var td4 = $(" <td width='50px'></td>").text(user_name);
        var td5 = $(" <td width='50px'></td>").text(cat_name);

        var td6 = $(" <td width='100px'></td>").text("Static Tag");

        var td7 = $(" <td width='100px'> <img src='http://127.0.0.1:8000/" + logo + "' height='70px' width='80px'></td>");


        var a1 = $(" <a class='btn btn-info' href='show/product/" + id + "' </a>").text("Show");
        var a2 = $(" <a class='btn btn-primary' href='edit/product/" + id + "' </a>").text("Edit");
        var a3 = $(" <a class='btn btn-danger' href='delete/product/" + id + "' onclick='return confirm(" + '"are you sure ?"' + ")' </a>").text("Delete");


        var td8 = $("<td width='1000px'> </td>").append(a1, a2, a3);
        var tr = $("<tr id='productRemove'></tr>").append(td1, td2, td3, td4, td5, td6, td7, td8);

        $("#loadProduct").append(tr);

    }

}