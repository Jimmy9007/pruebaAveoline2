function verRegistrar() {
    $.ajax({
        url: "../../Controlador/ControladorProducto.php",
        method: "GET",
        dataType: "html",
        data: {idFormulario: 1},
        success: function (html) {
            $("#divContenido").html(html);
            $('#lbModalFormulario').html('Registrar Producto');
            //$('#modalFormulario').modal('slow');
            $('#modalFormulario').show('slow');
        }
    });
}
function verEditar(referencia) {
    $.ajax({
        url: "../../Controlador/ControladorProducto.php",
        method: "GET",
        dataType: "html",
        data: {idFormulario: 2, referencia: referencia},
        success: function (html) {
            $("#divContenido").html(html);
            $('#lbModalFormulario').html('Editar Producto');
            //$('#modalFormulario').modal('slow');
            $('#modalFormulario').show('slow');
        }
    });
}
function verEliminar(referencia) {
    $.ajax({
        url: "../../Controlador/ControladorProducto.php",
        method: "GET",
        dataType: "html",
        data: {idFormulario: 3, referencia: referencia},
        success: function (html) {
            $("#divContenido").html(html);
            $('#lbModalFormulario').html('Eliminar Producto');
            //$('#modalFormulario').modal('slow');
            $('#modalFormulario').show('slow');
        }
    });
}
function verDetalle(referencia) {
    $.ajax({
        url: "../../Controlador/ControladorProducto.php",
        method: "GET",
        dataType: "html",
        data: {idFormulario: 4, referencia: referencia},
        success: function (html) {
            $("#divContenido").html(html);
            $('#lbModalFormulario').html('Detalle Producto');
            //$('#modalFormulario').modal('slow');
            $('#modalFormulario').show('slow');
        }
    });
}

function setFormulario(datos) {
    //alert(datos);
    $("#divContenido").html(datos);
    $('#modalFormulario').modal('show');
}

function validarRegistrar(evt, formulario) {
    evt.preventDefault();
    Swal.fire({
        title: "DESEA REGISTRAR ESTE PRODUCTO ?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Si",
        cancelButtonText: "No",
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            formulario.removeAttribute('onsubmit');
            formulario.submit();
        }
    });
}
function validarEditar(evt, formulario) {
    evt.preventDefault();
    Swal.fire({
        title: "DESEA EDITAR ESTE PRODUCTO ?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Si",
        cancelButtonText: "No",
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            formulario.removeAttribute('onsubmit');
            formulario.submit();
        }
    });
}
function validarEliminar(evt, formulario) {
    evt.preventDefault();
    Swal.fire({
        title: "DESEA ELIMINAR ESTE PRODUCTO ?",
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Si",
        cancelButtonText: "No",
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            formulario.removeAttribute('onsubmit');
            formulario.submit();
        }
    });
}

function cerrarModal() {
    $('#modalFormulario').hide('slow');
}

function existeReferencia(referencia) {
    $.ajax({
        url: "../../Controlador/ControladorProducto.php",
        method: "POST",
        dataType: "json",
        data: {referencia: referencia},
        success: function (json) {
            if (json['existe'] === true) {
                Swal.fire({
                    title: "EXISTE ESA REFERENCIA ?",
                    text: "" + $("#Referencia").val(),
                    icon: "warning",
                });
            }
        }
    });
}