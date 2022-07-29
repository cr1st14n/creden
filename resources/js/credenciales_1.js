var_delete_credencial = "";
idEmpleadoEdit = "";
function fun_credeEmp_edit(param) {
    console.log(param);
    $.ajax({
        type: "post",
        url: "credenciales/query_edit_emp",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            id: param,
        },
        // dataType: "dataType",
        success: function (response) {
            // console.log(new Date(response.Vencimiento).formaToFecha('YYYY-MM-DD'));
            console.log(response);
            $("input[name=nc_tipo_edit]").val(response.data.Tipo);
            // $("input[name=nc_cod_edit]").val(response.data.Codigo);
            $("input[name=nc_ci_edit]").val(response.data.CI);
            $("input[name=nc_nom_edit]").val(response.data.Nombre);
            $("input[name=nc_pa_edit]").val(response.data.Paterno);
            $("input[name=nc_ma_edit]").val(response.data.Materno);
            // $("input[name=nc_em_edit]").val(response.data.Empresa);
            $("#nc_em_edit_id").append(
                `<option value="${response.data.Empresa}" selected>${response.data.Empresa}</option>`
            );
            $("input[name=nc_car_edit]").val(response.data.Cargo);
            $("input[name=nc_codt_edit]").val(response.data.CodigoTarjeta);
            $("input[name=nc_codMy_edit]").val(response.data.CodMYFARE);
            $("input[name=nc_he_edit]").val(response.data.Herramientas);
            $("input[name=nc_areas_acceso_edit]").val(response.data.AreasAut);
            $("input[name=nc_gs_edit]").val(response.data.GSangre);
            $("input[name=nc_fv_edit]").val(response.ven);
            $("input[name=nc_acci_edit]").val(response.data);
            $("input[name=nc_nren_edit]").val(response.data.NroRenovacion);
            $("input[name=nc_f_in_edit]").val(response.ing);
            $("input[name=nc_FNac_edit]").val(response.nac);
            $("input[name=nc_pro_edit]").val(response.data.Profesion);
            $("input[name=nc_est_edit]").val(response.data.altura);
            $("input[name=nc_colojo_edit]").val(response.data.Ojos);
            $("input[name=nc_maCorp_edit]").val(response.data.Peso);
            $("input[name=nc_Fono_edit]").val(response.data.TelDom);
            $("input[name=nc_10_edit]").val(response.data.Direccion);
            $("input[name=nc_11_edit]").val(response.data.TelTrab);
            $("input[name=nc_12_edit]").val(response.data.DirTrab);
            $("input[name=nc_13_edit]").val(response.data.Observacion);
            $("input[name=nc_estCiv_edit]").val(response.data.EstCivil);
            $("input[name=nc_sexo_edit]").val(response.data.Sexo);

            idEmpleadoEdit = response.data.idEmpleado;
            $("#md_update_credencial").modal("show");
        },
    });
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
                var_delete_credencial = "";
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
                    var f = new Date(e.created_at);
                    f = f.toLocaleString("es-ES", "dd/mm/yyyy");

                    return (html = `
                <tr>
                    <td>${e.Codigo}</td>
                    <td>${e.Nombre} ${e.Paterno} ${e.Materno}</td>
                    <td>${e.CI}</td>
                    <td>${e.NombEmpresa}</td>
                    <td>${f}</td>
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

function input_busqueda_creden(param) {
    if (param.length != 0) {
        $.ajax({
            type: "get",
            url: "credenciales/query_buscar_A",
            data: { text: param },
            // dataType: "dataType",
            success: function (response) {
                html = response
                    .map(function (e) {
                        var f = new Date(e.Vencimiento);
                        f = f.toLocaleDateString();

                        return (html = `
                <tr>
                    <td>${e.Codigo}</td>
                    <td>${e.Nombre} ${e.Paterno} ${e.Materno}</td>
                    <td>${e.CI}</td>
                    <td>${e.NombEmpresa}</td>
                    <td>${f}</td>
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
    }else{
        queryShow_1();
    }
}
