<?php
include '../../app/dbConnection.php';
include '../../model/loginmodel.php';
$modelocliente = new $modelocliente($conn);
$action = $_POST['action'];


switch($action){
    case 'insert':
        $idcategoria = $_POST['categoria'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $imagen = $_FILES['img'];


        

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
    case 'edit':
        $idcategoria = $_POST['categoria'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $idproducto = $_POST['idProducto'];
        $img_actual = $_POST['img_actual'];
    
        $imagen = $_FILES['img'];
        $imgname = '';
    
        // Verifica si se ha subido una nueva imagen
        if ($imagen['size'] > 0) {
            // Si se ha subido una nueva imagen, procesa y guarda el archivo
            $imgname = $imagen['name'];
            move_uploaded_file($imagen['tmp_name'], '../../resources/imagenes-productos/'.$imgname);
        } else {
            // Si no se ha subido una nueva imagen, utiliza la imagen actual
            $imgname = $img_actual;
        }
    
        $result = $modeloProductos->editarProducto($idproducto ,$idcategoria, $nombre, $precio, $descripcion, $stock, $imgname);
    
        if($result == 1){
            $response['msg'] = "El producto se editó correctamente.";
            $response['status'] = true;
            echo json_encode($response);
        } else {
            $response['msg'] = "Error al editar el producto.";
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