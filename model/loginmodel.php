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
            
            if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                if ($this->esadmin($usuario) && password_verify($password, $row['contrasena'])) {
                    return ['id' => $row['id'], 'usuario' => $row['usuario'], 'es_admin' => true];
                } elseif (!$this->esadmin($usuario) && password_verify($password, $row['contrasena'])) {
                    return ['id' => $row['id'], 'usuario' => $row['usuario'], 'es_admin' => false];
                }
            }
            return null; // Credenciales incorrectas
        } catch (PDOException $e) {
            throw new Exception("Error de base de datos: " . $e->getMessage());
        }
    }

   
        function esadmin($usuario) {
            $sql = $this->conn->prepare("SELECT id_empleado FROM empleado_role WHERE id_rol = ? LIMIT 1");
            $sql->execute([$usuario]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);
        
            if ($result && $result['es_admin'] == 1) {
                return true; // El usuario es administrador
            } else {
                return false; // El usuario no es administrador
            }
        }
        
      
    
}

?>

