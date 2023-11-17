<?php include('../../partials/header.php'); 
$idProducto = $_GET['id'];
include('../../model/productoModel.php');
$modeloProductos = new productoModel($conn);
$producto = $modeloProductos->obtenerProductoPorId($idProducto);
$productoCompleto = mysqli_fetch_object($producto);
?>

<div id="wrapper">

    <!-- Sidebar -->
    <?php include('../../partials/sidebar.php');?>

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>


            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Editar Producto</h1>

                <!-- Your Form Goes Here -->
                <form id="editProductForm" action="" method="post">
                    <div class="form-group">
                        <label for="productName">Nombre:</label>
                        <input type="text" class="form-control" id="productName" name="nombre" value="<?=$productoCompleto->nombre?>" required>
                    </div>

                    <div class="form-group">
                        <label for="productDescription">Descripción:</label>
                        <textarea class="form-control" id="productDescription" name="descripcion" rows="3" required><?=$productoCompleto->descripcion?></textarea>
                    </div>




                    <div class="form-group">
                        <label for="productDepartment">Categoria:</label>
                        <select class="form-control" id="productDepartment" name="categoria" required>
                            <option value="">Selecciona Una</option>
                            <!-- Add more options as needed -->
                            <?php
                            // Llama a la función para obtener las categorías
                            $categorias = $modeloProductos->obtenerCategorias();

                            if ($categorias) {
                                while ($row = mysqli_fetch_assoc($categorias)) {
                                    // Verifica si la categoría actual coincide con el valor de $productoCompleto->id_categoria
                                    $selected = ($row['id'] == $productoCompleto->id_categoria) ? 'selected' : '';

                                    // Imprime una opción por cada categoría con el atributo selected según la condición
                                    echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['nombre'] . '</option>';
                                }
                                // Libera la memoria de los resultados
                                mysqli_free_result($categorias);
                            }
                            ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Imagen actual</label>
                        <img src="../../resources/imagenes-productos/<?= $productoCompleto->imagen ?>" alt="Imagen actual del producto" style="max-width: 300px; height: auto;">
                    </div>
                    <input type="text" name="img_actual" id="" value="<?= $productoCompleto->imagen ?>" hidden>
                    <input type="text" name="idProducto" id="" value="<?= $productoCompleto->id ?>" hidden>

                    <div class="mb-3">
                        <label for="" class="form-label">Subir Nueva Imagen</label>
                        <input type="file" class="form-control" name="img" id="" placeholder="" aria-describedby="fileHelpId" accept="image/*">
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="productPrice">Precio:</label>
                            <input type="number" class="form-control" id="productPrice" name="precio" step="0.01" value="<?= $productoCompleto->precio ?>" required>
                        </div>

                        <div class="form-group col">
                            <label for="productStock">Stock:</label>
                            <input type="number" class="form-control" id="productStock" name="stock" value="<?= $productoCompleto->stock ?>" required>
                        </div>
                    </div>

                    <a class="btn btn-primary mt-3" onclick="editarProducto()" type="button">Guardar cambios</a>
                </form>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
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



<?php include('../../partials/footer.php'); ?>