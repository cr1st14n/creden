var_delete_credencial = "";
function fun_credeEmp_edit(param) {
    console.log(param);
}
function fun_credeEmp_delete(param) {
    var_delete_credencial = param;
    $("#md_show_deleteConfirm").modal("show");
}
function destroy_credencial() {
    $.ajax({
        type: "post",
        url: "credenciales/query_destroy_credencial",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            id: var_delete_credencial,
        },
        // dataType: "dataType",
        success: function (response) {
            $("#md_show_deleteConfirm").modal("show");
            if (response) {
                var_delete_credencial="";
                $("#md_show_deleteConfirm").modal("hide");
                queryShow_1();
            } else {
                console.log("error");
            }
        },
    });
}

function fun_credeEmp_camera(param) {
    myDropzone.options.url = "credenciales/query_add_photo/" + param;
    myDropzone.removeAllFiles(true);
    $("#md_add_photo").modal("show");
}
function fun_credeEmp_emage(param) {
    console.log(param);
    reg = $("#reg_aero").attr("name");
    var url = `credenciales/pdf_creden_emp_a/${param}/${reg}`;
    console.log(reg);
    $("#emb_sec_pdf_creden").attr("src", url);
    $("#md_show_credencial").modal("show");
}
function fun_credeEmp_print(param) {
    console.log(param);
}
function queryShow_1() {
    $.ajax({
        type: "get",
        url: "credenciales/queryShow_1",
        // data: "data",
        // dataType: "dataType",
        success: function (res) {
            html = res
                .map(function (e) {
                    return (html = `
                <tr>
                    <th scope="row">${e.idEmpleado}</th>
                    <td>${e.Codigo}</td>
                    <td>${e.Nombre} ${e.Paterno} ${e.Materno}</td>
                    <td>${e.CI}</td>
                    <td>
                        <img src="${e.urlphoto}" width="60px" alt="">
                    </td>
                    <td>
                        <div class="">
                            <button type="button" onclick="fun_credeEmp_edit('${e.idEmpleado}')" class="btn btn-icon btn-dark"><i class="ik ik-edit "></i></button>
                            <button type="button" onclick="fun_credeEmp_delete('${e.idEmpleado}')" class="btn btn-icon btn-warning"><i class="ik ik-delete"></i></button>
                            <button type="button" onclick="fun_credeEmp_camera('${e.idEmpleado}')" class="btn btn-icon btn-primary"><i class="ik ik-camera"></i></button>
                            <button type="button" onclick="fun_credeEmp_emage('${e.idEmpleado}')" class="btn btn-icon btn-success"><i class="ik ik-image"></i></button>
                            <button type="button" onclick="fun_credeEmp_print('${e.idEmpleado}')" class="btn btn-icon btn-info"><i class="ik ik-printer"></i></button>
                        </div>
                    </td>
                </tr>
                `);
                })
                .join(" ");
            $("#view_1_body_1").html(html);
        },
    });
}
