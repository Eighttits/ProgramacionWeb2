<?php
include '../../app/dbConnection.php';
include '../../model/clientemodel.php';
$modeloClientes = new clientemodel($conn);
$action = $_POST['action'];


switch($action){
    case 'insert':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo_electronico = $_POST['correo_electronico'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        
        $result = $modeloClientes->insertarCliente($nombre, $apellido, $correo_electronico, $direccion, $telefono);
    
        if($result == 1){
            $response['msg'] = "El cliente se registró correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al registrar el cliente.";
            $response['status'] = false;
            echo json_encode($response);
        }
        break;
    case 'edit':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo_electronico = $_POST['correo_electronico'];
        $id = $_POST['id'];
    
        $result = $modeloClientes->editarCliente($nombre, $apellido, $correo_electronico,$id);
    
        if($result == 1){
            $response['msg'] = "El cliente se editó correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al editar el cliente.";
            $response['status'] = false;
            echo json_encode($response);
        }
        break;
    
    case 'delete':
        $idCliente = $_POST['idCliente'];
        $result = $modeloClientes->eliminarCliente($idCliente);
        if($result == 1){
            $response['msg'] = "El cliente se eliminó correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al eliminar el cliente.";
            $response['status'] = false;
            echo json_encode($response);
        }
    break;

    default:
    break;
}


?>