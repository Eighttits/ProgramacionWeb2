function eliminarEmpleado(idEmpleado) {
    const formData = new FormData();
    formData.append("action", "delete");
    formData.append("idEmpleado", idEmpleado); // Agrega el ID del producto a eliminar

    $.ajax({
        url: "../../controller/empleado/empleadoController.php",
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
                                window.location.href = "../../../views/empleados/empleados.php";
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

function guardarEmpleado() {
    const formulario = document.getElementById('addEmployeeForm');
    const formData = new FormData(formulario);
    formData.append("action", "insert");

    for(const[clave,valor] of formData.entries()){
        console.log(clave,"->",valor);
    }
    
    $.ajax({
        url: "../../controller/empleado/empleadoController.php",
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
                                window.location.href = "../../../views/empleados/empleados.php";
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
                                window.location.href = "../../../views/empleados/empleados.php";
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

function iniciarSesion(){
    console.log('click inicar');
    const formulario = document.getElementById("form-login");
    const formData = new FormData(formulario);


    formData.append("action", "ingresar");

    const nombre = formulario.querySelector("#usr").value;
    const password = formulario.querySelector("#pwd").value;

    console.log("Nombre-> " + nombre);
    console.log("pass-> " + password);

    $.ajax({
        url: "../../controller/empleado/empleadoController.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function (response){
            console.log(response);
            if(response.status){
                window.location.href = 'views/auth/dashboard.php';
            }

            else{
            $.confirm({
                title: '¡Error!',
                content: response.msg,
                type: 'gray',
                theme: 'bootstrap',
                typeAnimated: true,
                buttons: {
                    confirm: {
                        text: 'Aceptar',
                        btnClass: '',
                        action: function() {
                            window.location.href = 'index.php';
                        }
                    },
                }
            });
            }
        },
    
        error: function (e){
            console.log(e);
            $.confirm({
                title: '¡Error!',
                content: 'Ingresa los datos correctamente.',
                type: 'red',
                theme: 'modern',
                typeAnimated: true,
                buttons: {
                    confirm: {
                        text: 'Aceptar',
                        btnClass: 'btn-success',
                        action: function() {
                            window.location.href = 'index.php';
                        }
                    },
                }
            });
        }
    
    
    })
}

function editarEmpleado() {
    const formulario = document.getElementById('editEmployeeForm');
    const formData = new FormData(formulario);
    formData.append("action", "edit");

    for(const[clave,valor] of formData.entries()){
        console.log(clave,"->",valor);
    }
    
    $.ajax({
        url: "../../controller/empleado/empleadoController.php",
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
                                window.location.href = "../../../views/empleados/empleados.php";
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
                                window.location.href = "../../../views/empleados/empleados.php";
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

// var folioDepartamento = 0;



// function loadCategories(folio) {
//     folioDepartamento = folio;
//     // var selectedDepartment = document.getElementById("productDepartment").value;
//     console.log(folio);
//     return folio;
// }
