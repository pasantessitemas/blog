<?php

include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['username'];
    $pass = $_POST['password'];
    $correo = $_POST['email'];
    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];

    $sql = "INSERT INTO users (username, password, email, name, last_name) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("sssss", $usuario, $pass, $correo, $nombre, $apellido);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            echo 'Registro exitoso';
        } else {
            echo 'Error al registrar';
        }
        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta';
    }

    $conexion->close();
}

