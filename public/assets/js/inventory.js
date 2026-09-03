$(document).ready(function () {

    $("input[name='search']").on("keyup", function () {

        var keyword = $(this).val();

        $.ajax({
            url: searchUrl,
            type: "GET",
            data: {
                search: keyword
            },
            success: function (response) {
                $("#inventoryTable").html(response);
            }
        });

    });

});
