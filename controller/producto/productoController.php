<?php
include '../../app/dbconection.php';
include '../../model/productoModel.php';
$modeloProductos = new productoModel($conn);
$action = $_POST['action'];


switch($action){
    // case 'insert':
    //     $idcategoria = $_POST['categoria'];
    //     $nombre = $_POST['nombre'];
    //     $descripcion = $_POST['descripcion'];
    //     $marca = $_POST['marca'];
    //     $codigo_barras = $_POST['codigo_barras'];
    //     $stock = $_POST['stock'];
    //     $hora_creacion = date("H:i:s");
    //     $fecha_creacion = date("Y-m-d");
        

    //     $result = $modeloProductos->insertarProducto($idcategoria, $nombre, $descripcion, $marca, $codigo_barras, $stock, $fecha_creacion, $hora_creacion);
    
    //     if($result == 1){
    //         $response['msg'] = "El producto se registro correctamente.";
    //         $response['status'] = true;
    //         echo json_encode($response);
    //     } else {
    //         $response['msg'] = "Error al registrar el producto.";
    //         $response['status'] = false;
    //         echo json_encode($response);
    //     }
    // break;
    case 'delete':
        $idproducto = $_POST['idProducto'];
        $result = $modeloProductos->eliminarProducto($idproducto);
        if($result == 1){
            $response['msg'] = "El producto se elimino correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al eliminar el producto.";
            $response['status'] = false;
            echo json_encode($response);
        }
    break;

    
    default:
    break;
}

?>