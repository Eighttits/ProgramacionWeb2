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

    public function ingresar($nombre, $password){
        $SqlConsulta = "SELECT usuario, contrasena FROM empleado";
        $result = mysqli_query($this->conn, $SqlConsulta);
        
        while ($row = mysqli_fetch_object($result)){
            $name = $row->usuario;
            $pass = $row->contrasena;




            if($nombre == $name && $password == $pass){
                return 2;
            }
            else if($nombre == $name){
                return 1;
            }

            else if($nombre == '' && $password == ''){
                return 3;
            }
        }
        return 0;
    }

    public function obtenerEmpleado($usuario) {
        $sqlConsulta = "SELECT * FROM empleado WHERE usuario = '$usuario';";
        $result = mysqli_query($this->conn, $sqlConsulta);
    
        // Verifica si la consulta fue exitosa
        if ($result) {
            // Obtiene la fila como un array asociativo
            $empleadoData = mysqli_fetch_assoc($result);
    
            // Libera la memoria del resultado
            mysqli_free_result($result);
    
            return $empleadoData;
        } else {
            // Manejo de errores (puedes personalizar según tus necesidades)
            echo "Error en la consulta: " . mysqli_error($this->conn);
            return null;
        }
    }
    

    public function eliminarEmpleado($idempleado){
        $sqlConsulta = "DELETE FROM empleado WHERE id = '$idempleado';";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }

    public function obtenerEmpleadoPorId($idEmpleado){
        $sqlConsulta = "SELECT * FROM empleado WHERE id = '$idEmpleado';";
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;

    }
    
    public function editarEmpleado($nombre, $apellido, $email, $id){
        $sqlConsulta = "UPDATE empleado
                        SET nombre = '$nombre',
                            apellido = '$apellido',
                            correo_electronico = '$email'
                        WHERE id = $id;";
        
        $result = mysqli_query($this->conn, $sqlConsulta);
        return $result;
    }
    
}


?>
