function eliminarCliente(idCliente) {
    const formData = new FormData();
    formData.append("action", "delete");
    formData.append("idCliente", idCliente);

    $.ajax({
        url: "../../controller/cliente/clienteController.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response);

            if (response.status) {
                $.confirm({
                    title: "Éxito",
                    content: response.msg,
                    type: "green",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-success",
                            action: function () {
                                window.location.href = "../../../views/cliente/clientes.php";
                            },
                        },
                    },
                });
            } else {
                $.confirm({
                    title: "Error",
                    content: response.msg,
                    type: "red",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-danger",
                            action: function () {
                                window.location.href = "../../../views/cliente/clientes.php";
                            },
                        },
                    },
                });
            }
        },
        error: function (xhr, status, error) {
            alert('Error en AJAX: ' + error); // Muestra un mensaje de alerta con el tipo de error
            console.log("Error en AJAX: ", xhr.responseText); // Muestra el detalle completo del error en la consola
        }

    });
}

function guardarCliente() {
    const formulario = document.getElementById('addClientForm');
    const formData = new FormData(formulario);
    formData.append("action", "insert");

    for (const [clave, valor] of formData.entries()) {
        console.log(clave, "->", valor);
    }

    $.ajax({
        url: "../../controller/cliente/clienteController.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response);

            if (response.status) {
                $.confirm({
                    title: "Éxito",
                    content: response.msg,
                    type: "green",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-success",
                            action: function () {
                                window.location.href = "../../../views/cliente/cliente.php";
                            },
                        },
                    },
                });
            } else {
                $.confirm({
                    title: "Error",
                    content: response.msg,
                    type: "red",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-danger",
                            action: function () {
                                window.location.href = "../../../views/cliente/cliente.php";
                            },
                        },
                    },
                });
            }
        },
        error: function (e) {
            console.log(e);
            console.log('Error en ajax')
        },
    });
}
function editarCliente() {
    const formulario = document.getElementById('editClienteForm');
    const formData = new FormData(formulario);
    formData.append("action", "edit");

    for (const [clave, valor] of formData.entries()) {
        console.log(clave, "->", valor);
    }

    $.ajax({
        url: "../../controller/cliente/clienteController.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response);

            if (response.status) {
                $.confirm({
                    title: "Éxito",
                    content: response.msg,
                    type: "green",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-success",
                            action: function () {
                                window.location.href = "../../../views/clientes/cliente.php";
                            },
                        },
                    },
                });
            } else {
                $.confirm({
                    title: "Error",
                    content: response.msg,
                    type: "red",
                    theme: "modern",
                    typeAnimated: true,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            btnClass: "btn btn-danger",
                            action: function () {
                                // Handle error here
                                alert("Error al editar el cliente: " + response.error); // Muestra el mensaje de error específico
                                console.log("Detalle del error:", response.error); // Muestra el detalle completo del error en la consola
                            },
                        },
                    },
                });
            }
        },
        error: function (xhr, status, error) {
            alert('Error en AJAX: ' + error); // Muestra un mensaje de alerta con el tipo de error
            console.log("Error en AJAX: ", xhr.responseText); // Muestra el detalle completo del error en la consola
        },
    });
}
