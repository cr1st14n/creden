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
$('#btn_menu_B_User').click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "Usuarios/view_2_user",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            $('#main_cont').html(response);
        }
    });
});

