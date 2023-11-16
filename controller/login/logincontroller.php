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
                if ($credentials['es_admin']) {
                    header("location: index_admin.php");
                    exit;
                } else {
                    header("location: index.php");
                    exit;
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">¡Error! Contraseña o usuario incorrectoe, inténtalo de nuevo.</div>';
                echo $usuario;
                echo $password;
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

// Uso del controlador
$loginController = new LoginController();
$loginController->iniciarSesion($usuario, $password);
?>
