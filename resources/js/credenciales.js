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

    $("#md_add_credencial").modal("show");
});

$("#form_new_creden").submit(function (e) {
    e.preventDefault();
    // console.log($("#form_new_creden").serialize());
    $.ajax({
        type: "post",
        url: "credenciales/query_create_1",
        data: $("#form_new_creden").serialize(),
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


