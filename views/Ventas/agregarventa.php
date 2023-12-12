<?php include('../../partials/header.php'); ?>


<div id="wrapper">

    <?php include('../../partials/sidebar.php');
    include('../../model/productoModel.php');
    $modeloProductos = new productoModel($conn);
    ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php include('../../partials/nav.php'); ?>
            <div class="container-fluid">


                <h1 class="h3 mb-4 text-gray-800">Agregar Nueva venta</h1>


                <form id="addProductForm" action="" method="post">



                    <div class="form-group">
                        <label for="productDepartment">Producto:</label>
                        <!-- You need to replace the options in the select dropdown with your actual departments -->
                        <select class="form-control" id="productDepartment" name="categoria" required onchange="loadCategories(this.value)">
                            <option value="">Selecciona Una</option>
                            <!-- Add more options as needed -->
                            <?php
                            // Llama a la función para obtener las categorías
                            $productos = $modeloProductos->obtenerProductos();

                            if ($productos) {
                                while ($row = mysqli_fetch_assoc($productos)) {
                                    // Imprime una opción por cada producto con su nombre y precio
                                    echo '<option value="' . $row['id'] . '" data-precio="' . $row['precio'] . '">' . $row['nombre'] . '</option>';
                                }
                                // Libera la memoria de los resultados
                                mysqli_free_result($productos);
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row">


                        <div class="form-group col">
                            <label for="productStock">Cantidad</label>
                            <input type="number" class="form-control" id="productStock" name="stock" required>
                        </div>
                    </div>

                    <a class="btn btn-primary mt-3 mb-3" onclick="Agregar()" type="button">Agregar</a>
                </form>


            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                        </table>
                        <div class="mt-3 mb-3">
                            <label for="totalPrice" class="font-weight-bold">Total:</label>
                            <input type="text" class="form-control" id="totalPrice" readonly>
                        </div>

                        <a href="../Ventas/agregarventa.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generar venta
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<script>
    function Agregar() {
        var productoSeleccionado = document.getElementById("productDepartment");
        var nombreProducto = productoSeleccionado.options[productoSeleccionado.selectedIndex].text;
        var idProducto = productoSeleccionado.value; // ID del producto seleccionado
        var cantidadProducto = document.getElementById("productStock").value;
        var precioProducto = parseFloat(productoSeleccionado.options[productoSeleccionado.selectedIndex].getAttribute('data-precio'));
        var total = precioProducto * cantidadProducto;

        var table = $('#dataTable').DataTable();
        table.row.add([
            idProducto,
            nombreProducto,
            precioProducto,
            cantidadProducto,
            total
        ]).draw(false);

        calcularTotalPrecio();
    }


    function calcularTotalPrecio() {
        var total = 0;

        $('#dataTable tbody tr').each(function() {
            var precioProducto = parseFloat($(this).find('td:eq(4)').text());
            total += precioProducto;
        });


        $('#totalPrice').val(total.toFixed(2));
    }
</script>

<?php include('../../partials/footer.php'); ?>