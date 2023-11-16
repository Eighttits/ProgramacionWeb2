<?php 
class Login {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    function login($usuario, $password){
        try {
            $sql = $this->conn->prepare("SELECT id, usuario, contrasena FROM empleado WHERE usuario = ? LIMIT 1");
            $sql->execute([$usuario]);
            
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            
            if ($row && password_verify($password, $row['contrasena'])) {
                return ['id' => $row['id'], 'usuario' => $row['usuario']];
            }
    
            return null; // Credenciales incorrectas o usuario no encontrado
        } catch (PDOException $e) {
            throw new Exception("Error de base de datos: " . $e->getMessage());
        }
    }
    

   
        function esadmin($usuario) {
            $sql = $this->conn->prepare("SELECT id_empleado FROM empleado_role WHERE id_rol = ? LIMIT 1");
            $sql->execute([$usuario]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);
        
            if ($result && $result['es_admin'] == 1) {
                return true; 
            } else {
                return false; 
            }
        }
        
      
    
}

?>

