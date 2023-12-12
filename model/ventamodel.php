<?php

class ventamodel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertarVenta($idCliente, $idEmpleado, $fecha, $total) {
        $sqlConsulta = "INSERT INTO venta (id_cliente, id_empleado, fecha, total) VALUES ('$idCliente', '$idEmpleado', '$fecha', '$total');";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }

    public function obtenerVentas() {
        $sqlConsulta = "SELECT * FROM venta";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }

    public function obtenerVentaPorId($idVenta) {
        $sqlConsulta = "SELECT * FROM venta WHERE id = $idVenta;";
        $result = mysqli_query($this->conn, $sqlConsulta);
        
        if ($result) {
            $ventaData = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            return $ventaData;
        } else {
            echo "Error en la consulta: " . mysqli_error($this->conn);
            return null;
        }
    }
    
}



?>
