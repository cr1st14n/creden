$('#btn_menu_A').click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "credenciales/view_1",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            $('#main_cont').html(response);
        }
    });
});