<?php include('../../partials/header.php'); ?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php include('../../partials/sidebar.php');

    ?>

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
                <!-- Topbar Navbar -->
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Agregar Cliente Nuevo</h1>

                <!-- Formulario para agregar cliente -->
                <form id="addClientForm" action="" method="post">
                    <div class="row">
                        <div class="form-group col">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="form-group col">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" name="apellido" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="correo_electronico">Correo Electrónico:</label>
                            <input type="email" class="form-control" name="correo_electronico">
                        </div>
                        <div class="form-group col">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" name="direccion">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" class="form-control" name="telefono">
                        </div>
                        <div class="form-group col">
                            <!-- Aquí puedes incluir otros campos específicos del cliente -->
                        </div>
                    </div>

                    <a class="btn btn-primary mt-3" onclick="guardarCliente()" type="button">Guardar</a>
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
