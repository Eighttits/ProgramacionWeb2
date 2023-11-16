<?php

class productoModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    function obtenerRol()
    {
        $SqlConsulta = "SELECT * FROM rol;";
        $result = mysqli_query($this->conn, $SqlConsulta);
        if($result){
            return $result;
        }
    }

    public function insertarempleado($id, $nombre, $apellido, $correo_electronico, $usuario , $contrasena){
        $sqlConsulta = "INSERT INTO producto(id, nombre, apellido, correo_electronico, usuario, contrasena)
        VALUES($id, '$nombre', '$apellido', '$correo_electronico', '$usuario', '$contrasena');";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }

    ### funciones de consulta de informacion ###
    public function obtenerEmpleado(){
        $SqlConsulta = "SELECT p.*,c.nombre AS 'categoria'
                        FROM  empleado p
                        INNER JOIN empleado_rol c ON p.id = c.id
                        ORDER BY p.id ASC;";
        $result = mysqli_query($this->conn, $SqlConsulta);
        if($result){
            return $result;
        }
    }

    public function eliminarProducto($idproducto){
        $sqlConsulta = "DELETE FROM producto WHERE id = '$idproducto';";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }

    public function obtenerProductoPorId($idProducto){
        $sqlConsulta = "SELECT * FROM producto WHERE id = '$idProducto';";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;

    }
    
    public function editarProducto($idProducto, $idcategoria, $nombre, $precio, $descripcion, $stock, $imgname){
        $sqlConsulta = "UPDATE producto
                        SET id_categoria = $idcategoria,
                            nombre = '$nombre',
                            precio = '$precio',
                            descripcion = '$descripcion',
                            stock = '$stock',
                            imagen = '$imgname'
                        WHERE id = $idProducto;";
        
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }
    
}


?>
