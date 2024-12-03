<?php

include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $correo = $_POST['email'];
    $usuario = $_POST['username'];
    $pass = $_POST['password'];
    $country = $_POST['country'];


    $sql = "INSERT INTO users ('nombre, apellido, correo, usuario, contraseña, pais') VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = $conexion->prepare($sql)) { 
        $stmt->bind_param("sssss", $usuario, $pass, $correo, $nombre, $apellido);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            echo 'Registro exitoso';
        } else {
            echo 'Error al registrar';
        }
        $stmt->close();
        header('Location:../vistas/index.html');
    } else {
        echo 'Error en la preparación de la consulta';
    }
    $conexion->close();
}

?>




