function loadCategory() {
    jQuery.ajax({
        type: "GET",
        url: "/categories",
        data: {},
        success: function () {
            window.location.href = '/categories';
        }
    });
}