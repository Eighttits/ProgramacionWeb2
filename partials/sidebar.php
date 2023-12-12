<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../../views/auth/dashboard.php">
        <div class="sidebar-brand-text mx-3">Deji Deri</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="../../../views/auth/dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoProductos" aria-expanded="true" aria-controls="collapseTwoProductos">
            <i class="fas fa-fw fa-box"></i>
            <span>Productos</span>
        </a>
        <div id="collapseTwoProductos" class="collapse" aria-labelledby="headingTwoProductos" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="../../../views/productos/productos.php">Ver productos</a>
                <a class="collapse-item" href="../../../views/productos/agregar-producto.php">Agregar producto</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoEmpleados" aria-expanded="true" aria-controls="collapseTwoEmpleados">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Empleados</span>
        </a>
        <div id="collapseTwoEmpleados" class="collapse" aria-labelledby="headingTwoEmpleados" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="../../../views/empleados/empleados.php">Ver empleados</a>
                <a class="collapse-item" href="../../../views/empleados/agregar-empleado.php">Agregar empleado</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>Clientes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="../../../views/clientes/cliente.php">Ver clientes</a>
                <a class="collapse-item" href="../../../views/clientes/agregar-cliente.php">Agregar clientes</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>