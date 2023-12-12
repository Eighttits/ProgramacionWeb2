function guardarVenta() {
    const formulario = document.getElementById('addSaleForm');
    const formData = new FormData(formulario);
    formData.append("action", "insert"); // Indica la acción que se realizará en el backend

    for (const [clave, valor] of formData.entries()) {
        console.log(clave, "->", valor); // Muestra los datos que se están enviando
    }

    $.ajax({
        url: "../../controller/venta/ventaController.php", // Ruta de tu controlador de ventas
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response); // Muestra la respuesta del servidor

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
                                window.location.href = "../../../views/venta/venta.php"; // Redirecciona si es exitoso
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
                                window.location.href = "../../../views/venta/venta.php"; // Redirecciona si hay un error
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
