<?php
session_start();
include '../../app/dbConnection.php';
include '../../model/loginmodel.php';

class LoginController {
    public function iniciarSesion($usuario, $password) {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=deji", "root", "admin");
            $loginModel = new Login($conn); // Crea una instancia del modelo Login

            // Llama al método login del modelo Login
            $credentials = $loginModel->login($usuario, $password);

            if ($credentials !== null) {
                $_SESSION['user_id'] = $credentials['id'];
                $_SESSION['user_name'] = $credentials['usuario'];
                
                // Redirige según el tipo de usuario
                header("location: index.php"); // Puedes personalizar la redirección
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">¡Error! Contraseña o usuario incorrecto, inténtalo de nuevo.</div>';
            }
        } catch (PDOException $e) {
            // Manejo de errores de conexión a la base de datos
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            // Otros errores
            echo "Error: " . $e->getMessage();
        }
        
    }
}

// Recibe los datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Instancia y ejecuta el inicio de sesión
$loginController = new LoginController();
$loginController->iniciarSesion($usuario, $password);
?>
