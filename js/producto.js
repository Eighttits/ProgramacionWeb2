function eliminarProducto(idProducto) {
    const formData = new FormData();
    formData.append("action", "delete");
    formData.append("idProducto", idProducto); // Agrega el ID del producto a eliminar

    $.ajax({
        url: "../../controller/producto/productoController.php",
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
                                window.location.href = "../../../views/productos/productos.php";
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

function guardarProducto() {
    const formulario = document.getElementById('addProductForm');
    const formData = new FormData(formulario);
    formData.append("action", "insert");
    
    $.ajax({
        url: "../../controller/producto/productoController.php",
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
                                window.location.href = "../../../views/productos/productos.php";
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
            console.log(e);
            console.log('Error en ajax')
        },
    });
}

function loadCategories() {
    var selectedDepartment = document.getElementById("productDepartment").value;
    console.log(selectedDepartment);
    var categorySelect = document.getElementById("productCategory");

    // Limpiar las opciones actuales
    categorySelect.innerHTML = '<option value="">Selecciona Una</option>';

    if (selectedDepartment !== "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                try {
                    // Intentar parsear la respuesta JSON
                    var categories = JSON.parse(xhr.responseText);

                    // Verificar si categories es un array y tiene al menos un elemento
                    if (Array.isArray(categories) && categories.length > 0) {
                        // Agregar las categorías al select
                        categories.forEach(function (category) {
                            var option = document.createElement("option");
                            option.value = category.id;
                            option.text = category.nombre;
                            categorySelect.add(option);
                        });
                    } else {
                        // Si no hay categorías, mostrar un mensaje o tomar otra acción
                        console.error("No se encontraron categorías para el departamento seleccionado.");
                    }
                } catch (error) {
                    console.error("Error al parsear la respuesta JSON:", error);
                }
            }
        };

        xhr.open("GET", "../../controller/categoria/get_categories.php?department=" + selectedDepartment, true);
        xhr.send();
    }
}