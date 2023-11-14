<?php

class productoModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    ### funciones de consulta de informacion ###
    public function obtenerProductos(){
        $SqlConsulta = "SELECT p.*,c.nombre AS 'categoria', d.nombre AS 'departamento'
                        FROM producto p 
                        INNER JOIN categoria c ON p.id_categoria = c.id
                        INNER JOIN departamento d ON p.id_departamento = d.id
                        ORDER BY p.id ASC;";
        $result = mysqli_query($this->conn, $SqlConsulta);
        if($result){
            return $result;
        }
    }

    public function eliminarProducto($idproducto){
        $idproducto = $_POST['idProducto'];
        $sqlConsulta = "DELETE FROM producto WHERE id = '$idproducto';";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }
}


?>
