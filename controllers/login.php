<?php

include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT usuario, contraseña FROM users WHERE usuario = ?";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['contraseña'])) {
                header("Location: ../vistas/Biotecnologia.html");
                exit();
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        } else {
            echo "Usuario o contraseña incorrectos";
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta";
    }
}

$conexion->close();
?>
