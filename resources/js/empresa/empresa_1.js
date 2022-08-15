$(document).ready(function () {
    show_list_empresa_1();
});
function show_list_empresa_1() {
    console.log("mostrar lista");
    $.ajax({
        type: "get",
        url: "Empresa/query_list",
        // data: "data",
        // dataType: "dataType",
        success: function (response) {
            list_table_empresas(response);
        },
    });
}

function inp_buscar_empr(param) {
    $.ajax({
        type: "get",
        url: "Empresa/query_buscar_A",
        data: { data: param },
        // dataType: "dataType",
        success: function (response) {
            list_table_empresas(response);
        },
    });
}

function list_table_empresas(response) {
    html_1 = response
        .map(function (u) {
            return (a = `
        <tr>
            <td>
                <div class="d-inline-block align-middle">
                    <div class="d-inline-block">
                        <h6 class="mb-0"> ${u.Empresa} </h6>
                        <p class="text-muted mb-0"> ${
                            u.NombEmpresa != null ? u.NombEmpresa : "..."
                        }</p>
                        <p class="text-muted mb-0">Rep. legal: ${
                            u.RepLegal != null ? u.RepLegal : "..."
                        }</p>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-inline-block align-middle">
                    <div class="d-inline-block">
                        <h6 class="mb-0">Telf: ${
                            u.Telefono != null ? u.Telefono : "###"
                        } , Email: ${u.Email != null ? u.Email : "..."}</h6>
                        <p class="text-muted mb-0">Direccion: ${
                            u.Direccion != null ? u.Direccion : "..."
                        }</p>
                    </div>
                </div>
            </td>
            <td class="text-left">
                <a href="#!" onclick="edit_user(${
                    u.id
                })"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                <a href="#!" onclick="delete_user(${
                    u.id
                })"><i class="ik ik-trash-2 f-16 text-red"></i></a>
            </td>
        </tr>
    `);
        })
        .join("");
    $("#table_list_body_1").html(html_1);
}

$("#btn_new_empresa").click(function (e) {
    e.preventDefault();
    $("#form_new_empresa").trigger("reset");
    $("#mod_new_empresa").modal("show");
    $().show();
});
$("#form_new_empresa").submit(function (e) {
    e.preventDefault();
    console.log(' create');
    $.ajax({
        type: "post",
        url: "Empresa/query_create",
        data: $(this).serialize(),
        dataType: "bolean",
        success: function (response) {
            console.log(response);
            if (response) {
                show_list_empresa_1();
                $("#form_new_empresa").trigger("reset");
                $("#mod_new_empresa").modal("hide");
            }
        },
    });
});
