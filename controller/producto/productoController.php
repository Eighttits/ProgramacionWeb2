<?php
include '../../app/dbConnection.php';
include '../../model/productoModel.php';
$modeloProductos = new productoModel($conn);
$action = $_POST['action'];


switch($action){
    case 'insert':
        $idcategoria = $_POST['categoria'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $imagen = $_FILES['img'];

        $imgname = $imagen['name'];
        move_uploaded_file($imagen['tmp_name'], '../../resources/imagenes-productos/'.$imgname);


        

        $result = $modeloProductos->insertarProducto($idcategoria, $nombre, $precio, $descripcion, $stock, $imgname);
    
        if($result == 1){
            $response['msg'] = "El producto se registro correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al registrar el producto.";
            $response['status'] = false;
            echo json_encode($response);
        }
    break;
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