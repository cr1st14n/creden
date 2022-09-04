$("#btn_newVehiculo").click(function (e) {
    e.preventDefault();
    $.get("Vehiculo/create_1", function (data, textStatus, jqXHR) {
        html = data.emp
            .map(function (param) {
                return (h = `<option value="${param.Empresa}">${param.NombEmpresa}</option>`);
            })
            .join(" ");
        $("#emp_c").html(html);
    });
    $("#md_newVehiculo").modal("show");
});
$.ajax({
    type: "post",
    url: "url",
    data: $("#form_newVehiculo").serialize(),
    // dataType: "dataType",
    success: function (response) {
        console.log(response);
        if (response) {
        }
    },
});
