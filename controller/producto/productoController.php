<?php
include '../../app/dbConnection.php';
include '../../model/productoModel.php';
$modeloProductos = new productoModel($conn);
$action = $_POST['action'];


switch($action){
    case 'insert':
        $idcategoria = $_POST['categoria'];
        $iddepartamento = $_POST['departamento'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $imagen = $_POST['txtimagen'];

        if($imagen['name'] != ''){
            if(!(file_exists("../../resources/images/productos"))){
                $estructura = "../../resources/images/productos";
                if(!mkdir($estructura, 0, true)){
                    die('fallo al crear carpetas...');
                }
                chmod($estructura, 0777);
            }
            $uploaddir = "../../resources/images/productos/";
            $nuevo_nombre = $imagen['name'];
    
            $uploadfile = $uploaddir . $nuevo_nombre;
    
            $subido = copy($imagen['tmp_name'], $uploadfile);
    
            if($subido){
                $nuevaImagen = rand(1,5)."_".$nuevo_nombre;
            } else{
                $nuevaImagen = "";
            }
        } else {
            $nuevaImagen = "";
        }
    
         

        

        $result = $modeloProductos->insertarProducto($idcategoria, $iddepartamento, $nombre, $precio, $descripcion, $stock,$imagen);
    
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