<?php
session_start(); // Iniciar la sesión

include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $pass = $_POST['password'];

    // Asegúrate de que las entradas no estén vacías
    if (empty($usuario) || empty($pass)) {
        echo "error campos vacíos"; // Mensaje de error si los campos están vacíos
        exit;
    }

    $sql = "SELECT usuario, contraseña FROM users WHERE usuario = ?";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
<<<<<<< HEAD
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['contraseña'])) { // Verifica la contraseña hash
                echo "success";
            } else {
                echo "Usuario o contraseña incorrectos";
             
=======
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_usuario, $db_pass);
            $stmt->fetch();
            // Verifica la contraseña ingresada con el hash almacenado
            if (password_verify($pass, $db_pass)) {
                $_SESSION['usuario'] = $db_usuario; // Establecer la sesión
                echo "success";
            } else {
                echo "error contraseña incorrecta"; // Mensaje genérico para contraseña incorrecta
>>>>>>> c79d95c4274b69315c67ccb4f2916009c12b4fd3
            }
        } else {
            echo "error usuario no encontrado"; // Mensaje genérico para usuario no encontrado
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }
}
?>