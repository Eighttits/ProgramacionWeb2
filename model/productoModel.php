<?php

class productoModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    function obtenerCategorias()
    {
        $SqlConsulta = "SELECT * FROM categoria;";
        $result = mysqli_query($this->conn, $SqlConsulta);
        if($result){
            return $result;
        }
    }

    public function insertarProducto($idcategoria, $nombre, $precio, $descripcion, $stock, $imgname){
        $sqlConsulta = "INSERT INTO producto(id_categoria, nombre, precio, descripcion, stock, imagen)
        VALUES($idcategoria, '$nombre', '$precio', '$descripcion', '$stock', '$imgname');";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }

    ### funciones de consulta de informacion ###
    public function obtenerProductos(){
        $SqlConsulta = "SELECT p.*,c.nombre AS 'categoria'
                        FROM producto p 
                        INNER JOIN categoria c ON p.id_categoria = c.id
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
