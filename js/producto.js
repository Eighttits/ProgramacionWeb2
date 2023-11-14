function eliminarProducto(idProducto) {
    const formData = new FormData();
    formData.append("action", "delete");
    formData.append("idProducto", idProducto); // Agrega el ID del producto a eliminar

    $.ajax({
        url: "../controller/producto/productoController.php",
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
                                window.location.href = "../../../views/producto/producto.php";
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
                                window.location.href = "../../../views/productos/productos.php";
                            },
                        },
                    },
                });
            }
        },
        error: function (e) {
            alert('Error en ajax');
            console.log(e); 
        }
    });
}
