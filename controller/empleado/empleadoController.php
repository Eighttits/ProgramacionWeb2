<?php
include '../../app/dbConnection.php';
include '../../model/empleadoModel.php';
$modeloEmpleados = new empleadoModel($conn);
$action = $_POST['action'];


switch($action){
    case 'insert':
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usr'];
        $pwd = $_POST['pwd'];
        $apellido = $_POST['apellido'];
        $rol = $_POST['rol'];
        $email= $_POST['email'];
        
        $result = $modeloEmpleados->insertarEmpleado($nombre, $usuario, $pwd, $apellido, $rol, $email);
    
        if($result == 1){
            $response['msg'] = "El empleado se registro correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al registrar el empleado.";
            $response['status'] = false;
            echo json_encode($response);
        }
        break;
    case 'ingresar':
        $usuario = $_POST['usr'];
        $contraseña = $_POST['pwd'];
        $result = $modeloEmpleados->ingresar($usuario,$contraseña);

        if($result == 2){
            session_start();
            $_SESSION['usuario'] = $usuario;
            $resp['msg'] = "Nombre y contraseña correctos.";
            $resp['status'] = true;
            echo json_encode($resp);
        }

        else if($result == 1){
            $resp['msg'] = "Contraseña incorrecta.";
            $resp['status'] = false;;
            echo json_encode($resp);
        }

        else if($result == 3){
            $resp['msg'] = "No dejar campos vacíos.";
            $resp['status'] = false;;
            echo json_encode($resp);
        }

        else{
            $resp['msg'] = "Usuario y contraseña inválidos.";
            $resp['status'] = false;
            echo json_encode($resp);
        }
    
        break;
    case 'edit':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $id = $_POST['id'];
    
        $result = $modeloEmpleados->editarEmpleado($nombre, $apellido, $email, $id);
    
        if($result == 1){
            $response['msg'] = "El empleado se editó correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al editar el empleado.";
            $response['status'] = false;
            echo json_encode($response);
        }
        break;
    
    case 'delete':
        $idempleado = $_POST['idEmpleado'];
        $result = $modeloEmpleados->eliminarEmpleado($idempleado);
        if($result == 1){
            $response['msg'] = "El empleado se elimino correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al eliminar el empleado.";
            $response['status'] = false;
            echo json_encode($response);
        }
    break;

    
    default:
    break;
}

?>