<?php include('../../partials/header.php');
include '../../model/productoModel.php';

$modeloProductos = new productoModel($conn);
$productos = $modeloProductos->obtenerProductos();

$nombre = array();
$precio = array();

foreach ($productos as $row) {
    $nombres[] = $row['nombre']; 
    $precios[] = $row['precio']; 
    } ?>
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<?php include('../../partials/sidebar.php'); ?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php include('../../partials/nav.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Bienvenido <?php echo $userInfo['nombre']; ?></h1>
                <a href="../Ventas/agregarventa.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generar venta</a>
            </div>

                    
                        </div>
                    </div>
                    <canvas id="miGrafico" class = "container mt-5"></canvas>
                </div>
                

            </div>
            
            
               

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
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
    var nombres = <?= json_encode($nombres)?>;
    var precios = <?= json_encode($precios)?>;

    var grafica = document.getElementById('miGrafico').getContext('2d');

    // Crea el gráfico de barras
    var miGrafico = new Chart(grafica, {
      type: 'bar',
      data: {
        labels: nombres, // Nombres de los productos en el eje X
        datasets: [{
          label: 'Precios',
          data: precios, // Precios en el eje Y
          backgroundColor:'rgba(0, 0, 255, 0.5)',
          borderColor: 'rgba(74, 35, 90, 1)',
          borderWidth: 1,
          borderRadius: 10
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Precios'
            }
          },
          x: {
            title: {
              display: true,
              text: 'Productos'
            },
          }
        }
      }
    });
  </script>

<?php
include '../../app/footer.php';
mysqli_close($conn);
?>

<script src="../../js/producto.js"></script>
<?php include('../../partials/footer.php'); ?>