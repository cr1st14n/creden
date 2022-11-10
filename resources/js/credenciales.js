var myDropzone = new Dropzone("#subImagen", {
    url: "null",
    headers: {
        "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
    },
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 1, // MB
    accept: function (file, done) {
        empleato = 1;
        if (empleato != null) {
            done("");
        } else {
            setTimeout(() => {
                myDropzone.removeFile(file);
            }, 3000);

            done("Error en llenado de detalle");
        }
    },
    success: function (file, response) {
        if (response) {
            $("#md_add_photo").modal("hide");
            queryShow_1();
        } else {
        }
    },
});

$("#btn_creden_add_item").click(function (e) {
    e.preventDefault();
    $("#form_new_creden").trigger("reset");
    $("#md_add_credencial").modal("show");
});
$("#nc_t_licencia").change(function (e) {
    e.preventDefault();
    tip = $("#nc_t_licencia").val();
    sel = {
        P: ["Motocicletass", "Vehiculos Particulares"],
        A: ["Camiotena", "Vagoneta", "Tipo Taxi", "Furgoneta"],
        B: [
            "Cinta Transportadora",
            "Tractor jalador de equipajes",
            "Escalera motorizada",
            "Carro de aguas servidas",
            "Transportador de Carga",
            "Cisterna de agua potable",
        ],
        C: [
            "Tractor remolcador",
            "Elevador de Cargas",
            "Camión Catering",
            "Cisterna Combustible",
            "Hyster",
            "Volqueta",
            "Tractor",
            "Retro excavadora",
            "Autobomba",
        ],
    };

    console.log(sel[tip]);
    html = sel[tip]
        .map(function (p, i) {
            return (html = `
            <div class="checkbox-fade fade-in-default">
                <label>
                    <input type="checkbox" name="tipo_vehiculo_aut${i}" value="${p}" onchange="saveTipoLicencia('${tip}','${i}')" >
                    <span class="cr">
                        <i class="cr-icon ik ik-check text-warning"></i>
                    </span>
                    <span>${p}</span>
                </label>
            </div>
                `);
        })
        .join(" ");
    $("#option_tipo_lic_veh").html(html);
});
sel_1 = {
    P: ["0", "0"],
    A: ["0", "0", "0", "0"],
    B: ["0", "0", "0", "0", "0", "0"],
    C: ["0", "0", "0", "0", "0", "0", "0", "0", "0"],
};
function saveTipoLicencia(l, i) {
    if (sel_1[l][i] == 0) {
        sel_1[l][i] = 1;
    } else {
        sel_1[l][i] = 0;
    }
    console.log(sel_1[l], i);
}

$("#form_new_creden").submit(function (e) {
    e.preventDefault();
    console.log($("#form_new_creden").serialize());
    $.ajax({
        type: "post",
        url: "credenciales/query_create_1",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            dataa: $("#form_new_creden").serialize(),
        },
        // dataType: "dataType",
        success: function (response) {
            if (response) {
                console.log(response);
                $("#md_add_credencial").modal("hide");
                $("#form_new_creden").trigger("reset");
                queryShow_1();
            }
        },
    });
});

$(".upload").on("click", function () {
    var formData = new FormData();
    console.log(formData);
    var files = $("#image")[0].files[0];
    console.log(formData);
    formData.append("file", files);
    $.ajax({
        url: "credenciales/query_add_photo",
        type: "get",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(formData);
            if (response != 0) {
                $(".card-img-top").attr("src", response);
            } else {
                alert("Formato de imagen incorrecto.");
            }
        },
    });
    return false;
});
