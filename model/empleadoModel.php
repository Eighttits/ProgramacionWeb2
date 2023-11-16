<?php

class empleadoModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }



    public function insertarEmpleado($nombre, $usuario, $pwd, $apellido, $rol, $emial){
        $sqlConsulta = "INSERT INTO empleado(nombre, usuario, contrasena, apellido, rol_id, correo_electronico)
        VALUES('$nombre', '$usuario', '$pwd', '$apellido', $rol, '$emial');";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }

    ### funciones de consulta de informacion ###
    public function obtenerEmpleados(){
        $SqlConsulta = "SELECT e.*, r.nombre AS 'rol'
                        FROM empleado e
                        INNER JOIN rol r ON e.rol_id = r.id
                        ORDER BY e.id ASC;";
        $result = mysqli_query($this->conn, $SqlConsulta);
        if($result){
            return $result;
        }
    }

    // public function eliminarProducto($idproducto){
    //     $sqlConsulta = "DELETE FROM producto WHERE id = '$idproducto';";
    //     $result = mysqli_query($this->conn, $sqlConsulta);
    //     return $result;
    // }

    // public function obtenerProductoPorId($idProducto){
    //     $sqlConsulta = "SELECT * FROM producto WHERE id = '$idProducto';";
    //     $result = mysqli_query($this->conn, $sqlConsulta);
    //     return $result;

    // }
    
    // public function editarProducto($idProducto, $idcategoria, $nombre, $precio, $descripcion, $stock, $imgname){
    //     $sqlConsulta = "UPDATE producto
    //                     SET id_categoria = $idcategoria,
    //                         nombre = '$nombre',
    //                         precio = '$precio',
    //                         descripcion = '$descripcion',
    //                         stock = '$stock',
    //                         imagen = '$imgname'
    //                     WHERE id = $idProducto;";
        
    //     $result = mysqli_query($this->conn, $sqlConsulta);
    //     return $result;
    // }
    
}


?>
