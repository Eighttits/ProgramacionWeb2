<?php

class clientemodel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }



    public function insertarcliente($nombre, $apellido, $correo_electronico, $direccion, $telefono){
        $sqlConsulta = "INSERT INTO cliente(nombre, apellido, correo_electronico, direccion, telefono)
        VALUES('$nombre', '$apellido', '$correo_electronico', '$direccion','$telefono');";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }

    ### funciones de consulta de informacion ###
    public function obtenerclientes(){
        $SqlConsulta = "SELECT * FROM cliente";
        $result = mysqli_query($this->conn, $SqlConsulta);
        if($result){
            return $result;
        }
    }

    public function obtenerCliente($usuario) {
        $sqlConsulta = "SELECT * FROM cliente WHERE usuario = '$usuario';";
        $result = mysqli_query($this->conn, $sqlConsulta);
    
        // Verifica si la consulta fue exitosa
        if ($result) {
            // Obtiene la fila como un array asociativo
            $clienteData = mysqli_fetch_assoc($result);
    
            // Libera la memoria del resultado
            mysqli_free_result($result);
    
            return $clienteData;
        } else {
            // Manejo de errores (puedes personalizar según tus necesidades)
            echo "Error en la consulta: " . mysqli_error($this->conn);
            return null;
        }
    }
    
    

    public function eliminarCliente($idCliente){
        $sqlConsulta = "DELETE FROM cliente WHERE id = '$idCliente';";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }
    
    public function obtenerClientePorId($idCliente){
        $sqlConsulta = "SELECT * FROM cliente WHERE id = '$idCliente';";
        $result = mysqli_query($this->conn, $sqlConsulta);
    
        if (!$result || mysqli_num_rows($result) == 0) {
            return null; 
        }
    
        return $result;
    }
    
    
    
    public function editarCliente($nombre, $apellido, $correo_electronico , $id){
        // Prevenir inyección SQL escapando los valores
        $nombre = mysqli_real_escape_string($this->conn, $nombre);
        $apellido = mysqli_real_escape_string($this->conn, $apellido);
        $correo_electronico  = mysqli_real_escape_string($this->conn, $correo_electronico );
    
        // Verificar y ajustar valores nulos o vacíos
        $sqlUpdate = "UPDATE cliente
                      SET nombre = '$nombre',
                          apellido = '$apellido'";
        
        if (!empty($correo_electronico )) {
            $sqlUpdate .= ", correo_electronico = '$correo_electronico '";
        }
        
        $sqlUpdate .= " WHERE id = $id;";
        
        $result = mysqli_query($this->conn, $sqlUpdate);
        return $result;
    }
    
}    


?>
