<?php
include '../../app/dbConnection.php';
include '../../model/ventamodel.php'; 
$modeloVentas = new ventamodel($conn); 

$action = $_POST['action'];

switch($action){
    case 'insert':
        $idCliente = $_POST['id_cliente'];
        $idEmpleado = $_POST['id_empleado'];
        $fecha = $_POST['fecha'];
        $total = $_POST['total'];

        $result = $modeloVentas->insertarVenta($idCliente, $idEmpleado, $fecha, $total);
    
        if($result == 1){
            $response['msg'] = "La venta se registró correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al registrar la venta.";
            $response['status'] = false;
            echo json_encode($response);
        }
    break;
}
?>
