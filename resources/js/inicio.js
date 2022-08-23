$("#btn_menu_A").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "credenciales/view_1",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            $("#main_cont").html(response);
            queryShow_1();
        },
    });
});
$("#btn_menu_B_User").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "Usuarios/view_2_user",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            $("#main_cont").html(response);
        },
    });
});
$("#btn_menu_B_Empr").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "Empresa/view_2_empr",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            $("#main_cont").html(response);
        },
    });
});
$(" #btn_menu_creden_B").click(function (e) {
    e.preventDefault();
    $.get("credenciales/view_cv_1",
        function (data, textStatus, jqXHR) {
            $("#main_cont").html(data);
        },
    );
});

function noti_fi(tp, tx) {
    console.log("ss");
    switch (tp) {
        case 1:
            params = {
                heading: "Success",
                text: tx,
                showHideTransition: "slide",
                icon: "success",
                loaderBg: "#f96868",
                position: "top-right",
                family: "amethyst",
            };

            break;
        case 2:
            params = {
                heading: "Info",
                text: tx,
                showHideTransition: "slide",
                icon: "info",
                loaderBg: "#46c35f",
                position: "top-right",
            };
            break;
        case 3:
            params = {
                heading: "Warning",
                text: tx,
                showHideTransition: "slide",
                icon: "warning",
                loaderBg: "#57c7d4",
                position: "top-right",
            };
            break;
        case 4:
            params = {
                heading: "Danger",
                text: tx,
                showHideTransition: "slide",
                icon: "error",
                loaderBg: "#f2a654",
                position: "top-right",
            };
            break;

        default:
            break;
    }
    $.toast(params);
}
